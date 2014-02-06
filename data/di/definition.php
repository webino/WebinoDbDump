<?php 
return array (
  'WebinoDbDump\\Module' => 
  array (
    'supertypes' => 
    array (
      0 => 'Zend\\ModuleManager\\Feature\\AutoloaderProviderInterface',
      1 => 'Zend\\ModuleManager\\Feature\\ConfigProviderInterface',
    ),
    'instantiator' => '__construct',
    'methods' => 
    array (
    ),
    'parameters' => 
    array (
    ),
  ),
  'WebinoDbDump\\Db\\Sql\\FileInterface' => 
  array (
    'supertypes' => 
    array (
    ),
    'instantiator' => NULL,
    'methods' => 
    array (
    ),
    'parameters' => 
    array (
    ),
  ),
  'WebinoDbDump\\Db\\Sql\\File' => 
  array (
    'supertypes' => 
    array (
      0 => 'SeekableIterator',
      1 => 'Iterator',
      2 => 'Traversable',
      3 => 'RecursiveIterator',
      4 => 'WebinoDbDump\\Db\\Sql\\FileInterface',
      5 => 'SplFileObject',
      6 => 'RecursiveIterator',
      7 => 'Traversable',
      8 => 'Iterator',
      9 => 'SeekableIterator',
      10 => 'SplFileInfo',
    ),
    'instantiator' => '__construct',
    'methods' => 
    array (
      '__construct' => 3,
      'setCsvControl' => 0,
      'setFlags' => 0,
      'setMaxLineLen' => 0,
      'setFileClass' => 0,
      'setInfoClass' => 0,
    ),
    'parameters' => 
    array (
      '__construct' => 
      array (
        'WebinoDbDump\\Db\\Sql\\File::__construct:0' => 
        array (
          0 => 'file_name',
          1 => NULL,
          2 => true,
          3 => NULL,
        ),
        'WebinoDbDump\\Db\\Sql\\File::__construct:1' => 
        array (
          0 => 'open_mode',
          1 => NULL,
          2 => false,
          3 => NULL,
        ),
        'WebinoDbDump\\Db\\Sql\\File::__construct:2' => 
        array (
          0 => 'use_include_path',
          1 => NULL,
          2 => false,
          3 => NULL,
        ),
        'WebinoDbDump\\Db\\Sql\\File::__construct:3' => 
        array (
          0 => 'context',
          1 => NULL,
          2 => false,
          3 => NULL,
        ),
      ),
      'setCsvControl' => 
      array (
        'WebinoDbDump\\Db\\Sql\\File::setCsvControl:0' => 
        array (
          0 => 'delimiter',
          1 => NULL,
          2 => false,
          3 => NULL,
        ),
        'WebinoDbDump\\Db\\Sql\\File::setCsvControl:1' => 
        array (
          0 => 'enclosure',
          1 => NULL,
          2 => false,
          3 => NULL,
        ),
        'WebinoDbDump\\Db\\Sql\\File::setCsvControl:2' => 
        array (
          0 => 'escape',
          1 => NULL,
          2 => false,
          3 => NULL,
        ),
      ),
      'setFlags' => 
      array (
        'WebinoDbDump\\Db\\Sql\\File::setFlags:0' => 
        array (
          0 => 'flags',
          1 => NULL,
          2 => true,
          3 => NULL,
        ),
      ),
      'setMaxLineLen' => 
      array (
        'WebinoDbDump\\Db\\Sql\\File::setMaxLineLen:0' => 
        array (
          0 => 'max_len',
          1 => NULL,
          2 => true,
          3 => NULL,
        ),
      ),
      'setFileClass' => 
      array (
        'WebinoDbDump\\Db\\Sql\\File::setFileClass:0' => 
        array (
          0 => 'class_name',
          1 => NULL,
          2 => false,
          3 => NULL,
        ),
      ),
      'setInfoClass' => 
      array (
        'WebinoDbDump\\Db\\Sql\\File::setInfoClass:0' => 
        array (
          0 => 'class_name',
          1 => NULL,
          2 => false,
          3 => NULL,
        ),
      ),
    ),
  ),
  'WebinoDbDump\\Db\\Dump\\Table\\AbstractTable' => 
  array (
    'supertypes' => 
    array (
    ),
    'instantiator' => NULL,
    'methods' => 
    array (
      '__construct' => 3,
    ),
    'parameters' => 
    array (
      '__construct' => 
      array (
        'WebinoDbDump\\Db\\Dump\\Table\\AbstractTable::__construct:0' => 
        array (
          0 => 'name',
          1 => NULL,
          2 => true,
          3 => NULL,
        ),
        'WebinoDbDump\\Db\\Dump\\Table\\AbstractTable::__construct:1' => 
        array (
          0 => 'adapter',
          1 => 'WebinoDbDump\\Db\\Dump\\Adapter',
          2 => true,
          3 => NULL,
        ),
      ),
    ),
  ),
  'WebinoDbDump\\Db\\Dump\\Table\\TriggersInterface' => 
  array (
    'supertypes' => 
    array (
    ),
    'instantiator' => NULL,
    'methods' => 
    array (
    ),
    'parameters' => 
    array (
    ),
  ),
  'WebinoDbDump\\Db\\Dump\\Table\\AbstractColumns' => 
  array (
    'supertypes' => 
    array (
    ),
    'instantiator' => NULL,
    'methods' => 
    array (
      '__construct' => 3,
    ),
    'parameters' => 
    array (
      '__construct' => 
      array (
        'WebinoDbDump\\Db\\Dump\\Table\\AbstractColumns::__construct:0' => 
        array (
          0 => 'platform',
          1 => 'Zend\\Db\\Adapter\\Platform\\PlatformInterface',
          2 => true,
          3 => NULL,
        ),
      ),
    ),
  ),
  'WebinoDbDump\\Db\\Dump\\Table\\ColumnsInterface' => 
  array (
    'supertypes' => 
    array (
    ),
    'instantiator' => NULL,
    'methods' => 
    array (
    ),
    'parameters' => 
    array (
    ),
  ),
  'WebinoDbDump\\Db\\Dump\\Table\\AbstractTriggers' => 
  array (
    'supertypes' => 
    array (
      0 => 'WebinoDbDump\\Db\\Dump\\Table\\TriggersInterface',
    ),
    'instantiator' => NULL,
    'methods' => 
    array (
      '__construct' => 3,
    ),
    'parameters' => 
    array (
      '__construct' => 
      array (
        'WebinoDbDump\\Db\\Dump\\Table\\AbstractTriggers::__construct:0' => 
        array (
          0 => 'tableName',
          1 => NULL,
          2 => true,
          3 => NULL,
        ),
        'WebinoDbDump\\Db\\Dump\\Table\\AbstractTriggers::__construct:1' => 
        array (
          0 => 'adapter',
          1 => 'WebinoDbDump\\Db\\Dump\\Adapter',
          2 => true,
          3 => NULL,
        ),
      ),
    ),
  ),
  'WebinoDbDump\\Db\\Dump\\DumpInterface' => 
  array (
    'supertypes' => 
    array (
    ),
    'instantiator' => NULL,
    'methods' => 
    array (
    ),
    'parameters' => 
    array (
    ),
  ),
  'WebinoDbDump\\Db\\Dump\\Platform\\AbstractPlatform' => 
  array (
    'supertypes' => 
    array (
    ),
    'instantiator' => NULL,
    'methods' => 
    array (
      '__construct' => 3,
    ),
    'parameters' => 
    array (
      '__construct' => 
      array (
        'WebinoDbDump\\Db\\Dump\\Platform\\AbstractPlatform::__construct:0' => 
        array (
          0 => 'adapter',
          1 => 'WebinoDbDump\\Db\\Dump\\Adapter',
          2 => true,
          3 => NULL,
        ),
      ),
    ),
  ),
  'WebinoDbDump\\Db\\Dump\\Platform\\Mysql\\Table\\Columns' => 
  array (
    'supertypes' => 
    array (
      0 => 'WebinoDbDump\\Db\\Dump\\Table\\ColumnsInterface',
      1 => 'WebinoDbDump\\Db\\Dump\\Table\\AbstractColumns',
    ),
    'instantiator' => '__construct',
    'methods' => 
    array (
      '__construct' => 3,
    ),
    'parameters' => 
    array (
      '__construct' => 
      array (
        'WebinoDbDump\\Db\\Dump\\Platform\\Mysql\\Table\\Columns::__construct:0' => 
        array (
          0 => 'platform',
          1 => 'Zend\\Db\\Adapter\\Platform\\PlatformInterface',
          2 => true,
          3 => NULL,
        ),
      ),
    ),
  ),
  'WebinoDbDump\\Db\\Dump\\Platform\\Mysql\\Table\\Table' => 
  array (
    'supertypes' => 
    array (
      0 => 'WebinoDbDump\\Db\\Dump\\Table\\AbstractTable',
    ),
    'instantiator' => '__construct',
    'methods' => 
    array (
      '__construct' => 3,
    ),
    'parameters' => 
    array (
      '__construct' => 
      array (
        'WebinoDbDump\\Db\\Dump\\Platform\\Mysql\\Table\\Table::__construct:0' => 
        array (
          0 => 'name',
          1 => NULL,
          2 => true,
          3 => NULL,
        ),
        'WebinoDbDump\\Db\\Dump\\Platform\\Mysql\\Table\\Table::__construct:1' => 
        array (
          0 => 'adapter',
          1 => 'WebinoDbDump\\Db\\Dump\\Adapter',
          2 => true,
          3 => NULL,
        ),
      ),
    ),
  ),
  'WebinoDbDump\\Db\\Dump\\Platform\\Mysql\\Table\\Triggers' => 
  array (
    'supertypes' => 
    array (
      0 => 'WebinoDbDump\\Db\\Dump\\Table\\TriggersInterface',
      1 => 'WebinoDbDump\\Db\\Dump\\Table\\AbstractTriggers',
      2 => 'WebinoDbDump\\Db\\Dump\\Table\\TriggersInterface',
    ),
    'instantiator' => '__construct',
    'methods' => 
    array (
      '__construct' => 3,
    ),
    'parameters' => 
    array (
      '__construct' => 
      array (
        'WebinoDbDump\\Db\\Dump\\Platform\\Mysql\\Table\\Triggers::__construct:0' => 
        array (
          0 => 'tableName',
          1 => NULL,
          2 => true,
          3 => NULL,
        ),
        'WebinoDbDump\\Db\\Dump\\Platform\\Mysql\\Table\\Triggers::__construct:1' => 
        array (
          0 => 'adapter',
          1 => 'WebinoDbDump\\Db\\Dump\\Adapter',
          2 => true,
          3 => NULL,
        ),
      ),
    ),
  ),
  'WebinoDbDump\\Db\\Dump\\Platform\\Mysql\\Mysql' => 
  array (
    'supertypes' => 
    array (
      0 => 'WebinoDbDump\\Db\\Dump\\Platform\\PlatformInterface',
      1 => 'WebinoDbDump\\Db\\Dump\\Platform\\AbstractPlatform',
    ),
    'instantiator' => '__construct',
    'methods' => 
    array (
      '__construct' => 3,
    ),
    'parameters' => 
    array (
      '__construct' => 
      array (
        'WebinoDbDump\\Db\\Dump\\Platform\\Mysql\\Mysql::__construct:0' => 
        array (
          0 => 'adapter',
          1 => 'WebinoDbDump\\Db\\Dump\\Adapter',
          2 => true,
          3 => NULL,
        ),
      ),
    ),
  ),
  'WebinoDbDump\\Db\\Dump\\Platform\\PlatformInterface' => 
  array (
    'supertypes' => 
    array (
    ),
    'instantiator' => NULL,
    'methods' => 
    array (
    ),
    'parameters' => 
    array (
    ),
  ),
  'WebinoDbDump\\Db\\Dump\\Adapter' => 
  array (
    'supertypes' => 
    array (
    ),
    'instantiator' => '__construct',
    'methods' => 
    array (
      '__construct' => 3,
    ),
    'parameters' => 
    array (
      '__construct' => 
      array (
        'WebinoDbDump\\Db\\Dump\\Adapter::__construct:0' => 
        array (
          0 => 'adapter',
          1 => 'Zend\\Db\\Adapter\\AdapterInterface',
          2 => true,
          3 => NULL,
        ),
      ),
    ),
  ),
  'WebinoDbDump\\Db\\Dump\\Dump' => 
  array (
    'supertypes' => 
    array (
      0 => 'WebinoDbDump\\Db\\Dump\\DumpInterface',
    ),
    'instantiator' => '__construct',
    'methods' => 
    array (
      '__construct' => 3,
      'setDumpPlatform' => 0,
    ),
    'parameters' => 
    array (
      '__construct' => 
      array (
        'WebinoDbDump\\Db\\Dump\\Dump::__construct:0' => 
        array (
          0 => 'adapter',
          1 => NULL,
          2 => true,
          3 => NULL,
        ),
      ),
      'setDumpPlatform' => 
      array (
        'WebinoDbDump\\Db\\Dump\\Dump::setDumpPlatform:0' => 
        array (
          0 => 'dumpPlatform',
          1 => 'WebinoDbDump\\Db\\Dump\\Platform\\PlatformInterface',
          2 => false,
          3 => NULL,
        ),
      ),
    ),
  ),
);
