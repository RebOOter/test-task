<?php

function get_seo($url) {
    $opts = [
        'http' => [
            'method' => 'GET',
            'header' => "Cookie: test=seo\r\n"
        ]
    ];

    $context = stream_context_create($opts);

    $fp = file_get_contents($url, false, $context);
    if (!$fp)
        return null;

    $res = preg_match("/<title>(.*)<\/title>/siU", $fp, $title_matches);
    if ($res)
    {
        $title = preg_replace('/\s+/', ' ', $title_matches[1]);
        $title = trim($title);
        $seo['title'] = $title;
    } else
    {
        $seo['title'] = '';
    }

    $res = preg_match("/<meta name=\"description\" content=\"(.*)\">/siU", $fp, $desc_matches);
    if ($res)
    {
        $description = preg_replace('/\s+/', ' ', $desc_matches[1]);
        $description = trim($description);
        $seo['description'] = $description;
    } else
    {
        $seo['description'] = '';
    }

    return $seo;
}

echo "Meta checker\n\n\n";


$row = 0;
$errors = 0;
if (($csvFile = fopen('tests/_data/seo_example_wrong.csv', 'r')) !== false)
{
    while (($csvRow = fgetcsv($csvFile)) !== false)
    {
        //Pass first row
        if (!$row)
        {
            $row++;
            continue;
        }
        if (!($seo = get_seo($csvRow[0])))
        {
            echo "Can't open page $csvRow[0]\n";
            echo "------------------------------------------\n\n\n";
            continue;
        }

        if ($seo['description'] !== $csvRow[2])
        {
            echo "Wrong Meta description on page $csvRow[0]\n";
            echo "------------------------------------------\n";
            echo "Expected: $csvRow[2]\n";
            echo "Actual:   " . $seo['description'] . "\n";
            echo "------------------------------------------\n\n\n";
            $errors++;
        }

        if ($seo['title'] !== $csvRow[1])
        {
            echo "Wrong Title on page $csvRow[0]:\n";
            echo "------------------------------------------\n";
            echo "Expected: $csvRow[1]\n";
            echo "Actual:   " . $seo['title'] . "\n";
            echo "------------------------------------------\n\n\n";
            $errors++;
        }

    }
}

if ($errors)
{
    echo "We found $errors in SEO tags. Please, check them out above.\n";
} else
{
    echo "Nice! We didn't found any errors with SEO! :)\n";
}