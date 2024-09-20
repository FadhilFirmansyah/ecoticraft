<?php 

// ======= OLD =======
// class Template{
//     var $template_data = array();
//     var $CI;

//     function set($name, $value){
//         $this->template_data[$name] = $value;
//     }

//     function load($template = '', $view = '', $view_data = array(), $return = FALSE){
//         $this->CI =& get_instance();
//         $this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
//         return $this->CI->load->view($template, $this->template_data, $return);
//     }
// }


class Template{
    var $template_data = array();
    var $CI;

    // Method untuk menyimpan data
    function set($name, $value){
        $this->template_data[$name] = $value;
    }

    // Method untuk meload template
    function load($template = '', $view = '', $view_data = array(), $return = FALSE){
        $this->CI =& get_instance();

        // Gabungkan template data dan view data
        $view_data = array_merge($this->template_data, $view_data);

        // Set konten utama
        $this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
        
        // Load template utama
        return $this->CI->load->view($template, $this->template_data, $return);
    }
}



?>