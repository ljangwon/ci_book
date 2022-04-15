1. 특정 위치에 압축파일을 해제합니다.

1-1. dump.sql을 db에 입력.
1-2. 각 디렉토리의 application/config/database.php 파일을 열어 
     $db['default']['password'] 에 mysql root password를 입력후 저장.
1-3. 아파치 httpd.conf에 특정 위치를 localhost로 접속하도록 셋팅.

2. 접속주소

Todo 프로젝트 : http://localhost/todo/main
게시판 프로젝트 : http://localhost/bbs/board/lists/ci_board/page/1
SNS 프로젝트 : http://localhost/sns/controlls/lists/page/1

초기 로그인 아이디는 advisor, 비밀번호는 1234 입니다.


책 소스관련 질문은 만들면서 배우는 CodeIgniter Q&A 게시판(http://cikorea.net/cibook/lists/)을
이용하세요.