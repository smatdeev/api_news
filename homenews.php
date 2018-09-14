<?php //if ( ! defined('BASEPATH')) exit('No direct script access allowed');
      // header('Content-Type: application/json; charset=utf-8');

class Homenews extends CI_Controller {

	public function __construct()

	{
		 parent::__construct();
         $this->load->model('administrator/data');
         $this->load->helper('administrator/get');
         ini_set('memory_limit', "750M");
	}

 function  saeednews()
        { 
       header('Content-Type: application/json; charset=utf-8');
		
  	           $response = array();
			   $result_news = $this->db->query("select id,taitle,photo,photo1,photo2,photo3,newsall from news ORDER BY id DESC")->result();
                $response["newssaeed"] = array();
                foreach($result_news as $row)
                {
                        $product = array();
                        $product["id"]         = $row->id;
                        $product['taitle'] = $row->taitle;
                        $product['photo'] = $row->photo;
                        $product['photo1'] = $row->photo1;
                        $product['photo2'] = $row->photo2;
                        $product['photo3'] = $row->photo3;
			            $product['newsall'] = strip_tags($row->newsall);
			           // $product['newsall'] = nl2br($row->newsall);
						array_push($response ["newssaeed"], $product);
                }
                    echo json_encode($response );

        }
		
		 function  book()
        { 
       header('Content-Type: application/json; charset=utf-8');
		
  	           $response = array();
			   $result_news = $this->db->query("select id,titlebook,desbook,upbook from book ORDER BY id DESC")->result();
                $response["book"] = array();
                foreach($result_news as $row)
                {
                        $product = array();
                        $product["id"]         = $row->id;
                        $product['titlebook'] = $row->titlebook;
			            $product['desbook'] = strip_tags($row->desbook);
                        $product['upbook'] = $row->upbook;
						array_push($response ["book"], $product);
                }
                    echo json_encode($response );

        }
		
		
		
				 function  sound()
        { 
               header('Content-Type: application/json; charset=utf-8');

  	           $response = array();
			   $result_news = $this->db->query("select id,soundtitle,soundup,soundtext from sound ORDER BY id DESC")->result();
                $response["sound"] = array();
                foreach($result_news as $row)
                {
                        $product = array();
                        $product["id"]         = $row->id;
                        $product['soundtitle'] = $row->soundtitle;
			            $product['soundup'] = strip_tags($row->soundup);
                        $product['soundtext'] = $row->soundtext;
						array_push($response ["sound"], $product);
                }
                    echo json_encode($response );

        }
}
  



