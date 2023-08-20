<?php
$xmlFile = 'cxml_po_sample.xml';
$xmlData = simplexml_load_file(__DIR__ . '/../../xml/' . $xmlFile);

// Function to convert XML to a multi-dimensional array
function xmlToArray($xml) {
    $array = []; // Initialize an empty array to store the parsed data

    // Loop through each child element of the XML
    foreach ($xml->children() as $element) {
        $name = $element->getName(); // Get the name of the element
        $data = ['attributes' => [], 'value' => null]; // Initialize an array to store element data

        // Loop through each attribute of the element
        foreach ($element->attributes() as $attrName => $attrValue) {
            // Store attribute data in the 'attributes' key of the data array
            $data['attributes'][$attrName] = (string) $attrValue;
        }

        // Check if the element has child elements
        if ($element->count() === 0) {
            // If not, store the element value in the 'value' key of the data array
            $data['value'] = (string) $element;
        } else {
            // If yes, recursively call xmlToArray to parse child elements
            $data['value'] = xmlToArray($element);
        }

        // Add the data array to the main array under the element name
        $array[$name][] = $data;
    }

    return $array; // Return the final parsed array
}

// Recursively sorts the keys of a multidimensional array alphabetically.
function sortArrayKeysRecursive(&$array)
{
    // Element names are the keys
    // Sort the keys of the current level of the array alphabetically
    ksort($array);

    // Iterate through each element of the array
    foreach ($array as &$value) {
        // If the current value is an array, apply the sorting recursively
        if (is_array($value)) {
            sortArrayKeysRecursive($value);
        }
    }
}

function renderArray($array)
{
    echo '<ul>'; // Start the unordered list

    foreach ($array as $key => $value) {
        if (is_array($value)) { // If the value is an array, create a sublist
            if (!is_numeric($key)) {
                echo '<li><strong>' . $key . '</strong>'; // Output the key in bold
            }
            renderArray($value); // Recursively render the nested array
            if (!is_numeric($key)) {
                echo '</li>'; // Close the sublist item
            }
        } else { // If the value is not an array, output a list item
            echo '<li><strong>' . $key . '</strong>: ' . $value . '</li>'; // Output key and value
        }
    }

    echo '</ul>'; // Close the unordered list
}

// Call the xmlToArray function to parse the XML into an array
$dataArray = xmlToArray($xmlData);

// Sort the array keys recursively
sortArrayKeysRecursive($dataArray);
?>

<h1>Parsed and Sorted XML Data</h1>
<?php renderArray($dataArray); ?>

<hr/>


<h1>Convert cXML into JSON</h1>

<?php
// Encode XML data using json_encode
$jsonData = json_encode($xmlData);
// Decode JSON string and save array in arrayData
$arrayData = json_decode($jsonData, true);

// Sort the array keys alphabetically
sortArrayKeysRecursive($arrayData);

// Render the array as an HTML list
renderArray($arrayData);
?>
