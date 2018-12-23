# 학점 관리 시스템

강릉원주대학교 권기태 교수님의 소프트웨어공학 팀프로젝트입니다.

**학점 관리 시스템의 주요 기능**

- 학생이 그동안 어떤 강의을 수강했는지 알 수 있다.
- 현재 까지 몇 학점을 이수 했는지 알수 있다.
- 졸업 까지 몇 학점을 더 이수 해야하는지 알 수 있다.
- 이번 학기 어떤 강의를 수강해야 하는지 알 수 있다.

## 디렉토리 구성
- **index**
  - **css**
    - login.css
    - main.css
  - **img**
    - login.png
  - **process**
    - **admin**
      - DeleteCourse.php
      - InsertCourse.php
      - InsertGraduation.php
    - **login**
      - check.php
    - **student**
      - insert.php
  - **subpage**
    - _foot.html
    - _head.html
    - .htaccess
    - admin.html
    - logout.html
    - student.html
  - .htaccess
  - common.php
  - config.db.php
  - deleteCourse.php
  - index.php
  - layout.html
- **ProjectManage**
  - **docs**
    - 소프트웨어공학 실습조 제안 요청서.hwp
  - **Images**
    - adminfinish.png
    - usecaseDraft.png
  - **UseCase**
    - untitled.mdj
  - cm.sql
- readme.md

CreditManage file의 디렉토리는 크게 두가지로 나눕니다. index디렉토리는 웹서비스를 하는 루트 디렉토리 이고, ProjectManage디렉토리는 프로젝트 관리를 위한 문서나 이미지, starUML파일이 들어있습니다.

다음은 index디렉토리에 대한 자세한 설명 입니다.

1. index.php에서 session_start가 실행 되며 index/subpage/layout.html파일을 불러옵니다.
2. index/subpage/layout.html은 모든 웹페이지 화면을 3가지로 분류하여 head와 foot는 동일한 구성을 하고 가운데 subpage만 다르게 하여 전체적인 화면 구성을 통일합니다.
3. 루트 url로 접속하면 index/subpage/home.html페이지가 뜹니다. 여기서 학생로그인은 id, 비번으로 학번을 입력하고 관리자의 경우 id는 admin, 비번은 1234를 입력합니다.
4. index/subpage/home.html페이지의 폼 입력이 index/process/login/check.php로 보내지고 쿼리가 이루어집니다.
5. 학생으로 로그인한경우 index/subpage/student.html 화면이 실행되면 학생은 수강과목을 고를 수 있고 저장을 누르면 index/process/student/inset.php의 insert쿼리가 실행 됩니다.
6. 저장을 누를때 마다 index/subpage/student.html에서 이수학점이 계산됩니다.
7. 관리자로 접속한 경우 index/subpage/admin.html화면이 실행 되며 관리자는 과목을 삽입, 삭제할수 있고 다른 새로운 학번의 졸업 기준 학점도 입력 할수 있습니다.
8. index/process/admin디렉토리 아래 각 파일은 admin.html의 폼 데이터를 받아서 각 쿼리를 실행합니다.


생각보다 간단하죠??
# 데이터 베이스 스키마

ProjectManage/cm.sql은 mysql데이터 베이스를 export해 놓은 파일입니다.

```
CREATE TABLE IF NOT EXISTS `course` (
  `coursecode` varchar(10) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `gaincredit` int(11) DEFAULT NULL,
  `item` varchar(20) DEFAULT NULL,
  `period` varchar(10) NOT NULL,
  PRIMARY KEY (`coursecode`,`period`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `graduation` (
  `graduation` int(11) NOT NULL,
  `elective_c` int(11) DEFAULT NULL,
  `basic_m` int(11) DEFAULT NULL,
  `elective_m` int(11) DEFAULT NULL,
  `essential_m` int(11) DEFAULT NULL,
  PRIMARY KEY (`graduation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `signuped` (
  `studentid` int(11) NOT NULL,
  `coursecode` varchar(10) NOT NULL,
  `period` varchar(10) NOT NULL,
  PRIMARY KEY (`studentid`,`coursecode`,`period`),
  KEY `coursecode` (`coursecode`,`period`),
  CONSTRAINT `signuped_ibfk_1` FOREIGN KEY (`coursecode`, `period`) REFERENCES `course` (`coursecode`, `period`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `user_info` (
  `id` varchar(20) NOT NULL,
  `pw` int(11) DEFAULT NULL,
  `userid` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

# 실행 화면

![학생1](https://github.com/gwnuysw/CreditManagementForGWNUcse/blob/master/ProjectManage/Images/studentPage1.png?raw=true)

![학생2](https://github.com/gwnuysw/CreditManagementForGWNUcse/blob/master/ProjectManage/Images/studentPage2.png?raw=true)

![관리자](https://github.com/gwnuysw/CreditManagementForGWNUcse/blob/master/ProjectManage/Images/adminPage2.png?raw=true)
