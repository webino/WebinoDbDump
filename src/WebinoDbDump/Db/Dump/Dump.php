<?php
/**
 * Webino (http://webino.sk)
 *
 * @link        https://github.com/webino/WebinoDbDump for the canonical source repository
 * @copyright   Copyright (c) 2014 Webino, s. r. o. (http://webino.sk)
 * @license     The BSD 3-Clause License
 */

namespace WebinoDbDump\Db\Dump;

use SplFileObject as File;
use InvalidArgumentException;
use WebinoDbDump\Db\Dump\Platform\PlatformInterface as DumpPlatform;
use WebinoDbDump\Db\Sql\File as SqlFile;
use WebinoDbDump\Db\Sql\FileInterface as SqlFileInterface;
use Zend\Db\Adapter\AdapterInterface as DbAdapter;

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
     * @var DumpPlatform
     */
    protected $dumpPlatform;

    /**
     * @param DbAdapter|Adapter $adapter
     */
    public function __construct($adapter)
    {
        $this->setAdapter($adapter);
    }

    /**
     * @param DbAdapter|Adapter $adapter
     * @return self
     */
    protected function setAdapter($adapter)
    {
        if ($adapter instanceof DbAdapter) {
            $adapter = new Adapter($adapter);

        } elseif (!($adapter instanceof Adapter)) {
            throw new InvalidArgumentException('Expected Db\Adapter or Dump\Adapter');
        }

        $this->adapter = $adapter;
        return $this;
    }

    /**
     * @return DumpPlatform
     */
    public function getDumpPlatform()
    {
        if (null === $this->dumpPlatform) {
            $this->setDumpPlatform();
        }
        return $this->dumpPlatform;
    }

    /**
     * @param DumpPlatform $dumpPlatform
     * @return self
     */
    public function setDumpPlatform(DumpPlatform $dumpPlatform = null)
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
            throw new \RuntimeException(
                sprintf('Can\'t open file for reading `%s`', $filePath),
                $exc->getCode(),
                $exc
            );
        }
    }

    /**
     *
     */
    public function save($filePath)
    {
        $file = $this->createOutputFile($filePath, 'wb');
        $this->write($file);
        return $this;
    }

    /**
     * @param File $file
     * @return self
     */
    public function write(File $file)
    {
        // todo version
        $file->fwrite('-- WebinoDbDump 0.1.0' . PHP_EOL . PHP_EOL);

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
     *
     */
    public function load($filePath)
    {
        $file = $this->createInputFile($filePath);
        $this->read($file);
        return $this;
    }

    /**
     * @param SqlFileInterface $file
     * @return self
     */
    public function read(SqlFileInterface $file)
    {
        foreach ($file as $sql) {
            $this->adapter->executeQuery($sql);
        }
        return $this;
    }
}
