<?php


// lo más óptimo sería crear un controlador "EmployeesController.php" 
// (por ejemplo) y dentro de él crear sus respectivos métodos para cada acción.

class EmployeesController
{
    function __construct()
    {
        echo "Employees Controller";
        require_once('./employeeManager.php');

        $_POST = json_decode(file_get_contents('php://input', true), true);

        if (isset($_POST['action']) && isset($_POST['item'])) {

            switch ($_POST['action']) {
                case 'delete':
                    $response = deleteEmployee($_POST['item']['id']);
                    echo json_encode($response);

                    break;

                case 'create':
                    $response = addEmployee($_POST['item']);
                    echo json_encode($response);

                    break;

                case 'update':
                    $response = updateEmployee($_POST["item"]);
                    echo json_encode($response);

                    break;
            }

            //echo json_encode('Data recibida');
        }
    }
    function addEmployee(array $newEmployee)
    {
        // Verify the file path exist
        $jsonPath = '../../resources/employees.json';
        if (!file_exists($jsonPath)) return 'Invalid path';

        // Get JSON and update it
        $jsonArray = getJson($jsonPath);
        $idArray = [];
        $newJson = [];
        foreach ($jsonArray as $entry) {

            $newJson[] = $entry;
            $idArray[] = $entry["id"];
        }

        //Get max value from the ID Array to add the next ID

        $newId = max($idArray) + 1;
        $newEmployee["id"] = $newId;
        $newJson[] = $newEmployee;

        if (!file_put_contents($jsonPath, json_encode($newJson, JSON_PRETTY_PRINT))) {

            return "Failed to save data into json file";
        }

        return "Employee Added Successfully";
    }


    function deleteEmployee($id)
    {

        // Verify the file path exist
        $jsonPath = '../../resources/employees.json';
        if (!file_exists($jsonPath)) return 'Invalid path';

        // Get JSON and update it
        $jsonArray = getJson($jsonPath);
        $newJson = [];
        foreach ($jsonArray as $entry) {
            if ($entry['id'] !== $id) {
                $newJson[] = $entry;
            }
        }

        if (!file_put_contents($jsonPath, json_encode($newJson, JSON_PRETTY_PRINT))) {

            return "Failed to save data into json file";
        }

        return "Updated succesfully!";
    }


    function updateEmployee($newDataEmployee)
    {
        $jsonPath = "../../resources/employees.json";
        $employees = getJson($jsonPath);
        $updatedEmployees = [];

        if (!file_exists($jsonPath)) return 'Invalid path';

        foreach ($employees as $employee) {
            if ((int)$employee['id'] === (int)$newDataEmployee['id']) {
                $updatedEmployees[] = $newDataEmployee;
            } else {
                $updatedEmployees[] = $employee;
            }
        }

        if (!file_put_contents($jsonPath, json_encode($updatedEmployees, JSON_PRETTY_PRINT))) {
            return "Failed to save data into json file";
        }

        return 'Employee updated succesfully';
    }


    function getEmployee(string $id)
    {

        $employees = getJson("../resources/employees.json");

        foreach ($employees as $employee) {

            if ((int)$employee["id"] === (int)$id) return $employee;
        }

        return ("Employee not found");
    }
}
