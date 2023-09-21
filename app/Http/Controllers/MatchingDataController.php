<?php

namespace App\Http\Controllers;

use App\Models\MappingData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Http\Requests\ImportMainDataRequest;
use App\Models\MatchingData;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class MatchingDataController extends Controller
{
    public function index()
    {
        return view('matchData');
    }



    public function showData(Request $request)
    {
        $keyword = $request->keyword;
        if ($request->has('keyword')) {
            $results = MappingData::where('description', 'like', '%' . $keyword . '%')->get();
            return view('matchingData', compact('results', 'keyword'));
        }
    }

/*     public function searchInMappingData($worksheet, $request)
    {






    } */

    public function readExcelData(ImportMainDataRequest $request)
    {
        $filePath = $request->file('excel_file')->getRealPath();
        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();

        $data = [];
        $matchedKeywords = [];
        $unmatchedKeywords = [];
        $keywords = [];

        foreach ($worksheet->getRowIterator(2) as $row) {
            $rowData = [];
            foreach ($row->getCellIterator() as $cell) {
                $rowData[] = $cell->getValue();
            }
            $data[] = $rowData;
        }

        foreach ($data as $row) {
            $keyword = $row[1];
            $result = MappingData::where('description', 'like', '%' . $keyword . '%')->get();

            if ($result->isNotEmpty()) {
                $matchedKeywords[$keyword] = $result;
                $keywords[] = $keyword;
            } else {
                $unmatchedKeywords[] = $keyword;
            }

        }
        $data = ['matchedKeywords' => $matchedKeywords, 'unmatchedKeywords' => $unmatchedKeywords, 'keywords' => $keywords];

        // Store the data in the session without flashing it
        session()->put('myData', $data);

        // Redirect back to the displayResults route
        return redirect()->route('displayResults');
    }


    public function displayResults()
    {
        // Retrieve the data from the session
        $data = session('myData', ['matchedKeywords' => [], 'unmatchedKeywords' => [], 'keywords' => []]);
        $matchedKeywords = $data['matchedKeywords'];
        $unmatchedKeywords = $data['unmatchedKeywords'];
        $keywords = $data['keywords'];
        return view('matchingData_withImport', compact('matchedKeywords', 'unmatchedKeywords', 'keywords', 'data'));
    }


    public function store(Request $request)
    {
        MappingData::create([
            'description' => $request->description,
        ]);
    // Remove the selected row from the session data
    $data = Session::get('myData', []);

    // You can get the keyword you want to remove from the session
    $keywordToRemove = $request->description;

    // Check if the keyword exists in the unmatchedKeywords array and remove it
    if (($key = array_search($keywordToRemove, $data['unmatchedKeywords'])) !== false) {
        unset($data['unmatchedKeywords'][$key]);
    }

    // Update the session data without the removed keyword
    Session::put('myData', $data);
        return redirect()->route('displayResults')->with('success', 'Mapping created successfully.');

}
}
