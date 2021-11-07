<?php

$url = "https://api.publicapis.org/entries";
$data = file_get_contents($url);
$entries = json_decode($data, true);

$record = ($entries['entries']);

//Sorting API decreasing alphabetically through API value
function val_sort($record, $key)
{

    //Loop through and get the values of our specified key
    foreach ($record as $k => $v)
    {
        $b[] = strtolower($v[$key]);
    }

    krsort($b);

    foreach ($b as $k => $v)
    {
        $c[] = $record[$k];
    }

    return $c;
}

$sorted = val_sort($record, 'API');
print_r($sorted);

print ("---------------------------Array filtered using Category and Limit-------------------------------------------");

if (isset($argc))
{
    $category = $argv[1];
    $limit = $argv[2];

    function array_filter_by_value($my_array, $index, $value)
    {
        if (is_array($my_array) && count($my_array) > 0)
        {
            foreach (array_keys($my_array) as $key)
            {
                $temp[$key] = $my_array[$key][$index];

                if ($temp[$key] == $value)
                {
                    $new_array[$key] = $my_array[$key];
                }
            }
        }
        return $new_array;
    }

    $results = array_filter_by_value($sorted, 'Category', $category);
    is_null($results) ? print("No Category") : print_r(array_slice($results, 0, $limit));
    
   
}
else
{
    echo "argc and argv disabled\n";
}

?>
