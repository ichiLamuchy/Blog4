<?php
class Style{
    public $style_id;
    public $style;
    
    public function __construct($style_id, $style) {
        $this->style_id = $style_id;
        $this->style = $style;
    }
    
    public static function all(){
         $list = [];
            $db = Db::getInstance();
            $req = $db->query('SELECT * FROM STYLES');
            foreach($req->fetchAll() as $style) {
                $list[] = new Style($style['style_id'], $style['style']);
            }          
            return $list;
        }
}
