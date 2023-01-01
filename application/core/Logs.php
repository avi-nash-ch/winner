<?php

class Logs extends AUTH_Controller
{
    const VISITOR = 1;
    const INCIDENTS = 2;
    const LOGIN = 3;
    const PROPERTY = 4;

    function __construct()
    {
        parent::__construct();
    }
    protected function _args(array $otherArgs = [])
    {
        //get header vars
        $this->_head_args = $this->input->request_headers();
        $this->_get_request_args = $_REQUEST;
        // Merge both for one mega-args variable
        return  $this->_args = array_merge(
            $this->_head_args,
            $this->_get_request_args,
            ['custom_args' => $otherArgs]

        );
    }

    /**
     * Create a New Log
     * 
     * @param int      $orgId       Organisation ID
     * @param int      $logType     1=visitor,2=Incident,3=login,4=property
     * @param string   $logMessage  detailed log message with admin id and new record id
     * @param int|null $adminId     request created by user
     * 
     * @return mixed
     */
    protected function _create(int $orgId, int $logType, string $logMessage, $header, int $adminId = null): bool
    {
        $ci = &get_instance();
        return $ci->db->insert('logs', [
            'org_id' => $orgId,
            'admin_id' => $adminId,
            'log_type' => $logType,
            'description' => $logMessage,
            'ip_address' => $this->input->ip_address(),
            'header' => json_encode($this->_args),
            'created_date' => gmdate("Y-m-d H:i:s")
        ]);
    }
}
