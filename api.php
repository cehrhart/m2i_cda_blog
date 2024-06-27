<?php
	header("Content-Type: application/json");

	$strHTTPMethod 	= $_SERVER['REQUEST_METHOD'];
	$arrRequest 	= explode('/', trim($_SERVER['PATH_INFO']??'', '/'));

	$strResource = array_shift($arrRequest);
	var_dump($strHTTPMethod);
	var_dump($arrRequest);
	die;
	if ($strResource == 'articles') {
		switch ($strHTTPMethod) {
			case 'GET':
				handleGetRequest($arrRequest);
				break;
			case 'POST':
				handlePostRequest();
				break;
			case 'PUT':
				handlePutRequest($arrRequest);
				break;
			case 'DELETE':
				handleDeleteRequest($arrRequest);
				break;
			default:
				echo json_encode(['error' => 'Invalid request method']);
				break;
		}
	} else {
		echo json_encode(['error' => 'Invalid resource']);
	}

    function handleGetRequest($request) {
        require_once("models/article_model.php");
        $objModel   = new ArticleModel();

		if (count($request) == 0) {
			echo json_encode($objModel->findAll());
		} else {
			$id = $request[0];
			$user = $objModel->get($id);
			if ($user) {
				echo json_encode($user);
			} else {
				echo json_encode(['error' => 'Article non trouvé']);
			}
		}
	}

	function handlePostRequest() {
		$input = json_decode(file_get_contents('php://input'), true);
	}

	function handlePutRequest($request) {
		$input = json_decode(file_get_contents('php://input'), true);
	}

	function handleDeleteRequest($request) {
	}