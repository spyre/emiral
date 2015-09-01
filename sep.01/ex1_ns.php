<?php


		namespace devices\mob;
		
		class Mobile{
			public $name;
			public $price;

			public function info(){
				echo 'Mobil!<br/>';
			}
		}		

		namespace cms;

		class Post{

			public $title;
			public $content;

			public function info(){
				echo 'Post!<br/>';
			}
		}

		namespace main;
		use devices\mob as mobi;

		class Test{

			


			public static function functie(){
				$post = new \cms\Post();

				$mobil =  new mobi\Mobile();

				$post->info();
				$mobil->info();

				$timp = new \DateTime();
				var_dump($timp);
				
			}
		}

		Test::functie();

	?>
<html>
<head>
	<title>Hello</title>
</head>
<body>

</body>
</html>