<?php
//esta clase será utilizada por los modelos del sistema
class BaseDeDatos
{

    //declaramos las variables que utilizaremos para realizar la conexión a la bd
    protected $conexion;
    protected $isConnected = false;

    public function conectar()
    {
        //introducimos los datos para que el sistema acceda a la bd
        $credentials = require "aplicacion/modelos/credentials_config.php";

        $this->conexion = new mysqli($credentials["host"], $credentials["usernamebd"], $credentials["passbd"], $credentials["bd"]);

        //validamos la conexión 
        if ($this->conexion->connect_errno) {
            echo "Error de conexion:{$this->conexion->connect_error}";
            $this->isConnected = false;
        } else {
            $this->isConnected = true;
        }
        return $this->isConnected;
    }

    public function desconectar()
    {
        $this->isConnected = false;
        if ($this->conexion) {
            $this->conexion->close();
        }
    }

    //funcion que reconoce los datos de las tablas de la bd
    public function executeQuery($query)
    {
        $result = $this->conexion->query($query);
        $records = array();
        while ($record = $result->fetch_assoc()) {
            $records[] = $record;
        }
        return $records;
    }

    //funcion que se utiliza para eliminar, actualizar o guardar un registro
    public function executeInsert($query)
    {
        $result = $this->conexion->query($query);
        return $this->conexion->insert_id;
    }

    public function preparar_seleccion($query, $params = null)
    {
        if ($stmt = $this->conexion->prepare($query)) {
            if (!empty($params)) {
                // Extract values from $params array for binding
                $values = array_values($params);

                // Determine the types of the parameters and construct the type string
                $types = "";
                foreach ($values as $param) {
                    if (is_int($param)) {
                        $types .= "i"; // Integer
                    } elseif (is_double($param)) {
                        $types .= "d"; // Double
                    } elseif (is_string($param)) {
                        $types .= "s"; // String
                    } else {
                        $types .= "b"; // Blob or unknown
                    }
                }

                // Bind parameters dynamically using bind_param
                $bindParams = array_merge([$types], $values);

                // Call bind_param dynamically with the arguments in $bindParams array
                call_user_func_array([$stmt, 'bind_param'], $this->refValues($bindParams));
            }

            // Execute the prepared statement
            $stmt->execute();

            // Get result set
            $result = $stmt->get_result();

            // Fetch data
            $data = $result->fetch_all(MYSQLI_ASSOC);

            // Free result set
            $result->free();

            return $data;
        } else {
            // Handle prepare error if necessary
            return false;
        }
    }

    public function preparar_actualizar($table, $data, $condition)
    {
        // Construye la parte SET de la consulta UPDATE dinámicamente basada en el array $data
        $setClause = [];
        $types = ''; // String para los tipos de datos de bind_param
        $params = []; // Array para almacenar los valores a vincular

        foreach ($data as $key => $value) {
            if ($key === 'id_inventario') {
                continue; // Saltar el ID de inventario, que es para la condición WHERE
            }
            $setClause[] = "$key = ?";
            $types .= 's'; // Suponiendo que todos los valores son cadenas (strings)
            $params[] = $value;
        }

        // Agrega el tipo 'i' para el ID de inventario en la condición WHERE
        $types .= 'i';
        $params[] = $data['id_inventario'];

        // Construye la consulta UPDATE completa con la condición WHERE
        $query = "UPDATE $table SET " . implode(', ', $setClause) . " WHERE $condition";

        // Prepara la consulta
        if ($stmt = $this->conexion->prepare($query)) {
            // Vincula los parámetros usando bind_param
            $stmt->bind_param($types, ...$params);

            // Ejecuta la consulta preparada
            $result = $stmt->execute();

            // Verifica el éxito de la ejecución
            if ($result === true) {
                return true; // Actualización exitosa
            } else {
                return false; // Error en la actualización
            }
        } else {
            // Maneja el error de preparación si es necesario
            return false;
        }
    }




    public function preparar_insertar($table, $data)
    {
        // Build the query dynamically based on the table and data
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));

        $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";

        if ($stmt = $this->conexion->prepare($query)) {
            // Extract values from $data array for binding
            $values = array_values($data);

            // Dynamically bind parameters using bind_param
            $types = str_repeat('s', count($values)); // Assuming all values are strings

            $bindParams = array_merge([$types], $values);

            // Call bind_param dynamically with the arguments in $bindParams array
            call_user_func_array([$stmt, 'bind_param'], $this->refValues($bindParams));

            // Execute the prepared statement
            $q = $stmt->execute();

            if ($q === true) { // Use strict comparison to check for success
                return true;
            } else {
                return false;
            }
        } else {
            // Handle prepare error if necessary
            return false;
        }
    }

    // Function to reference array values for bind_param
    private function refValues($arr)
    {
        $refs = [];
        foreach ($arr as $key => $value) {
            $refs[$key] = &$arr[$key];
        }
        return $refs;
    }


    public function preparar_eliminar($query, $params)
    {
        if ($sentencia = $this->conexion->prepare($query)) {
            if (is_array($params)) {
                // Dynamically bind parameters using bind_param
                $types = ""; // String to store types of parameters
                $bindParams = []; // Array to store references to parameters

                foreach ($params as $key => $value) {
                    // Determine the type of each parameter and add it to $types
                    if (is_int($value)) {
                        $types .= "i"; // Integer
                    } elseif (is_double($value)) {
                        $types .= "d"; // Double
                    } elseif (is_string($value)) {
                        $types .= "s"; // String
                    } else {
                        $types .= "b"; // Blob or unknown
                    }

                    // Store references to the parameters for binding
                    $bindParams[] = &$params[$key];
                }

                // Prepend $types to $bindParams array
                array_unshift($bindParams, $types);

                // Call bind_param dynamically with the arguments in $bindParams array
                call_user_func_array(array($sentencia, 'bind_param'), $bindParams);
            } else {
                // If $params is not an array (single parameter case)
                $sentencia->bind_param("s", $params);
            }

            // Execute the prepared statement
            $q = $sentencia->execute();

            if ($q === true) { // Use strict comparison to check for success
                return true;
            } else {
                return false;
            }
        } else {
            // Handle prepare error if necessary
            return false;
        }
    }
}
