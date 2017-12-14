<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Response;
use Mail;

class SearchController extends Controller
{
    public function index() {
        return view('home');
    }

    public function submit(Request $request) {
        //validation with the rules of the fields
        $this->validate($request, [
            'company_symbol' => 'required|alpha',
            'datefrom' => 'required|date',
            'dateto' => 'required|date|after:datefrom',
            'email' => 'required|email'
        ]);

        //assign data to valiables and some transformations for the email and the request to nasdaq.com
        $symbol = strtoupper($request->input('company_symbol'));
        $datefrom = $request->input('datefrom');
        $fromforemail = date("Y-d-m", strtotime($datefrom));
        $datefromfin = date("M%20d,%20Y", strtotime($datefrom));
        $dateto = $request->input('dateto');
        $toforemail = date("Y-d-m", strtotime($dateto));
        $datetofin = date("M%20d,%20Y", strtotime($dateto));
        $recip = $request->input('email');

        //last check if the symbol is related to a company
        $checkForComp = 'http://www.nasdaq.com/screening/companies-by-name.aspx?&render=download';
        $rows = array_map('str_getcsv', file($checkForComp));
        $header = array_shift($rows);
        $csv = array();
        foreach ($rows as $row) {
            $csv[] = array_combine($header, $row);
        }
        $array = json_encode($csv);
        $compName = '';
        foreach($csv as $key => $value) {
            if ($value['Symbol'] == $symbol) {
                $compName = $value['Name'];
            }
        }
        
        //return the error if the symbol is not valid. Otherwise move to results and send the email.
        if(empty($compName)) {
            return redirect()->back()->withInput()->withErrors(['company_symbol' => 'Invalid company symbol.']);
        } else {
            $url = 'https://finance.google.com/finance/historical?output=csv&q='.$symbol.'&startdate='.$datefromfin.'&enddate='.$datetofin;
            $rows = array_map('str_getcsv', file($url));
            $header = array_shift($rows);
            $csv = array();
            foreach ($rows as $row) {
                $csv[] = array_combine($header, $row);
            }
            $array = json_encode($csv);
            $foremail = array('email'=>$recip, 'subject'=>$compName);

            Mail::raw('From '.$fromforemail.' to '.$toforemail, function($message) use ($foremail){
                $message->to($foremail['email'])->subject($foremail['subject']);
            });
            //csv variables holds the data collected from the csv an compName holds the company name.
            return view('results')->with('days', $csv)->with('company', $compName);
        }
        
    }
}
