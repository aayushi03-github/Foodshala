<?php
class Common_model extends CI_Model {

        public function __construct()
        {
        		parent::__construct();
                $this->load->database();
        }


	public function insert($table,$data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function login($table,$data)
	{
		$query = $this->db->get_where($table, $data);
		if($query->num_rows()) 
			return $query->result_array();
		else
		    return false;
	}
    public function getData($table)
    {
        $query = $this->db->get($table);
        if($query->num_rows())
            return $query->result_array();
        else{
            return false;
        }
    }

    public function upload_image($image_data,$num,$path1)
{
  $image = md5(date("d-m-y:h:i s"))."_".$num;
  if(is_array($image_data)) 
  {
   $file_name = pathinfo(@$image_data['name'], PATHINFO_FILENAME);
   $extension = pathinfo(@$image_data['name'], PATHINFO_EXTENSION);     
   if(move_uploaded_file(@$image_data['tmp_name'], $path1.''. $image.'.'.$extension)){
    $image = $image.'.'.$extension;
  }else{
    $image = Null;
  }
}
return $image;
}

    public function getDataWhere($table,$select,$where){

        $this->db->select($select);

        $this->db->from($table);

        $this->db->where($where);

        $query=$this->db->get();

        return $query->num_rows() === 1 ? $query->result_array() : false;

    }
	public function executeSql($sql,$type)
  {
    $query = $this->db->query($sql);
    switch ($type) {
     case 'update':
     $result = $query;
     break;
     case 'delete':
     $result = $query;
     break;
     case 'result_array':
     $result = $query->result_array();
     break;
     case 'row_array':
     $result = $query->row_array();
     break;
     case 'num_rows':
     $result = $query->num_rows();
     break;			
     default:
     $result = 'Failed';
     break;
   }		
   
   return $result;
 }

 public function deleteData($table, $cond)
{
 $this->db->where($cond);
 $res=$this->db->delete($table); 

 if($res)
 {
  return 1;
}
else
{
  return 0;
}
}

}