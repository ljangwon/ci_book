<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

 	function __construct()
	{
		parent::__construct();
	}

	/**
	 * 주소에서 메소드가 생략되었을 때 실행되는 기본 메소드
	 */

	/**
	 * 사이트 헤더, 푸터를 자동으로 추가해준다.
	 *
	 */
	public function _remap($method)
 	{
 		//헤더 include
        $this->load->view('header_v');

		if( method_exists($this, $method) )
		{
			$this->{"{$method}"}();
		}

		//푸터 include
		$this->load->view('footer_v');
    }

	/**
	 * 폼 검증 테스트
	 */
	public function forms()
	{
		//$this->output->enable_profiler(TRUE);

		//폼 검증 라이브러리 로드
		$this->load->library('form_validation');

		//폼 검증할 필드와 규칙 사전 정의
		$this->form_validation->set_rules('username', '아이디', 'required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('password', '비밀번호', 'required|matches[passconf]');
		$this->form_validation->set_rules('passconf', '비밀번호 확인', 'required');
		$this->form_validation->set_rules('email', '이메일', 'required|valid_email');

		if ($this->form_validation->run() == FALSE)
		{
			//폼 검증이 실패했을 경우 또는 일반 입력 페이지
			$this->load->view('test/forms_v');
		}
		else
		{
			//폼 검증이 성공했을 때 보여줄 페이지
			$this->load->view('test/form_success_v');
		}

	}

	public function lists()
    {
		$this->load->model('mongo_m');
        $data['list'] = $this->mongo_m->get_list();
        $this->load->view('mongo_list_v', $data);
    }

    public function insert()
    {
		$this->load->model('mongo_m');
		$this->load->helper('url');
        $name = $this->input->post('name', true);
        $this->mongo_m->insert($name);
        redirect('/test/lists', 'refresh');
    }
}

/* End of file board.php */
/* Location: ./application/controllers/test.php */