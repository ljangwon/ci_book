<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * todo controller.
 *
 * @author Jongwon, Byun <advisor@cikorea.net>
 */
class Main extends CI_Controller {

 	function __construct()
	{
		parent::__construct();
		$this->load->database();
        $this->load->model('todo_m');
		$this->load->helper('url');
	}

	/**
	 * 주소에서 메소드가 생략되었을 때 실행되는 기본 메소드
	 */
	public function index()
	{
		$this->lists();
	}

	/**
	 * todo 조회
	 */
	function view()
 	{
 		//todo 번호에 해당하는 데이터 가져오기
		$id = $this->uri->segment(3);

 		$data['views'] = $this->todo_m->get_view($id);

 		//view 호출
 		$this->load->view('todo/view_v', $data);
 	}

	/**
	 * todo 목록
	 */
	public function lists()
	{
		$data['list'] = $this->todo_m->get_list();

		$this->load->view('todo/list_v', $data);
	}

	/**
	 * todo 입력
	 */
	function write()
 	{
		if ( $_POST )
  		{
			//글쓰기 POST 전송시

	  		$content = $this->input->post('content', TRUE);
			$created_on = $this->input->post('created_on', TRUE);
			$due_date = $this->input->post('due_date', TRUE);

	  		$this->todo_m->insert_todo($content, $created_on, $due_date);

			redirect('/main/lists/');

			exit;
  		}
  		else
  		{
	 		//쓰기폼 view 호출
	 		$this->load->view('todo/write_v');
		}
 	}

	/**
	 * todo 삭제
	 */
	function delete()
 	{
 		//게시물 번호에 해당하는 게시물 삭제
		$id = $this->uri->segment(3);

 		$this->todo_m->delete_todo($id);

 		redirect('/main/lists/');
 	}

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */