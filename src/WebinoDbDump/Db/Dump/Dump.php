<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump/ for the canonical source repository
 * @copyright   Copyright (c) 2014-2016 Webino, s. r. o. (http://webino.sk)
 * @license     The BSD 3-Clause License
 */

namespace WebinoDbDump\Db\Dump;

use SplFileObject as File;
use WebinoDbDump\Db\Dump\Platform\PlatformInterface;
use WebinoDbDump\Db\Sql\SqlFile;
use WebinoDbDump\Db\Sql\SqlInterface;
use WebinoDbDump\Module;
use Zend\Db\Adapter\AdapterInterface;

/**
 * Database dump utility
 *
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
class Dump implements DumpInterface
{
    /**
     * SQL chunk size
     */
    const MAX_SQL_SIZE = 1e6;

    /**
     * @var Adapter
     */
    protected $adapter;

    /**
     * @var PlatformInterface
     */
    protected $dumpPlatform;

    /**
     * @param AdapterInterface|Adapter $adapter
     */
    public function __construct($adapter)
    {
        $this->setAdapter($adapter);
    }

    /**
     * @param AdapterInterface|Adapter $adapter
     * @return $this
     */
    protected function setAdapter($adapter)
    {
        if ($adapter instanceof AdapterInterface) {
            $adapter = new Adapter($adapter);

        } elseif (!($adapter instanceof Adapter)) {
            // TODO exception
            throw new \InvalidArgumentException('Expected Db\Adapter or Dump\Adapter');
        }

        $this->adapter = $adapter;
        return $this;
    }

    /**
     * @return PlatformInterface
     */
    public function getDumpPlatform()
    {
        if (null === $this->dumpPlatform) {
            $this->setDumpPlatform();
        }
        return $this->dumpPlatform;
    }

    /**
     * @param PlatformInterface $dumpPlatform
     * @return $this
     */
    public function setDumpPlatform(PlatformInterface $dumpPlatform = null)
    {
        if (null === $dumpPlatform) {
            $parts         = explode('\\', get_class($this->adapter->getPlatform()));
            $platformName  = end($parts);
            $platformClass = __NAMESPACE__ . '\Platform\\' . $platformName . '\\' . $platformName;
            $dumpPlatform  = new $platformClass($this->adapter);
        }

        $this->dumpPlatform = $dumpPlatform;
        return $this;
    }

    /**
     * Return new file object
     *
     * Prepend file path with `compress.zlib://` wrapper to use compression.
     *
     * @param string $filePath
     * @return File
     * @throws \RuntimeException
     */
    public function createOutputFile($filePath)
    {
        try {
            return new File($filePath, 'wb');
        } catch (\Exception $exc) {
            // TODO exception
            throw new \RuntimeException(
                sprintf('Can\'t open file for writing `%s`', $filePath),
                $exc->getCode(),
                $exc
            );
        }
    }

    /**
     * Return new sql file object
     *
     * Prepend file path with `compress.zlib://` wrapper to use compression.
     *
     * @param string $filePath
     * @return SqlFile
     * @throws \RuntimeException
     */
    public function createInputFile($filePath)
    {
        try {
            return new SqlFile($filePath, 'rb');
        } catch (\Exception $exc) {
            // TODO exception
            throw new \RuntimeException(
                sprintf('Can\'t open file for reading `%s`', $filePath),
                $exc->getCode(),
                $exc
            );
        }
    }

    /**
     * @param string $filePath
     * @return $this
     */
    public function save($filePath)
    {
        $file = $this->createOutputFile($filePath);
        $this->write($file);
        return $this;
    }

    /**
     * @param File $file
     * @return $this
     */
    public function write(File $file)
    {
        $file->fwrite('-- WebinoDbDump ' . Module::VERSION . PHP_EOL . PHP_EOL);

        $dumpPlatform = $this->getDumpPlatform();
        $file->fwrite($dumpPlatform->header());

        foreach ($dumpPlatform->showTables() as $table) {
            $dumpPlatform->createTable($table)->write($file);
        }

        $file->fwrite($dumpPlatform->footer());
        $file->fwrite('-- ' . date('Y-m-d H:i:s') . PHP_EOL);

        return $this;
    }

    /**
     * @param string $filePath
     * @return $this
     */
    public function load($filePath)
    {
        $file = $this->createInputFile($filePath);
        $this->read($file);
        return $this;
    }

    /**
     * @param SqlInterface $file
     * @return $this
     */
    public function read(SqlInterface $file)
    {
        foreach ($file as $sql) {
            $this->adapter->executeQuery($sql);
        }
        return $this;
    }
}
