# Xochi Digital Mantenance API #

Este es un proyecto en donde se integran componentes para interactuar con la base de datos directamente.

## migrations ##

En la carpeta dee migrations vienen archivos para crear la base de datos.

## Models ##

Viene el modelo de __Column__ que representa una columna de la tabla.

### Atributos ###

    protected $table = 'columns';

    protected $fillable = [
        "name",
        "type",
        "size"
    ];

### Métodos ###

    public function table();

Devuelve un modelo __Table__ al que pertenece.

    public static function fromStdClass(stdClass $obj);

Crea un objeto __Column__ a partir de un objeto stdClass con los mismos atributos.


## Table ##

### Atributos ###

    protected $table = "tables";

    protected $fillable = [
        "name"
    ];

### Métodos ###

    public function columns();

Devuelve una __Collection___ de __Column__.

    public function addColumn(Column $column);

Agrega una columna a la tabla tanto en la base de datos como en el registro.

    public function addColumnFromStdObject(stdClass $stardardObject);

Hace lo mismo que la anterior pero recibe un __stdClass__. 

## TableFactory ##

    public function createTable(String $name);

Crea una tabla tanto en el base de datos como en el registro.

        public function deleteTable(String $name);

Borrar una tabla tanto en la base de datos como en el registro.