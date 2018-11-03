<?php
	session_start();
	require_once('functions.php');
	$connect = mysqli_connect("localhost", "root", "verybadpassword");
	if (!$connect){
	    die("Connection failed: " . mysqli_connect_error());
	}
	$result_sql = "CREATE DATABASE IF NOT EXISTS Animals";
	$query = mysqli_query($connect, $result_sql);
	if ($query) {
	    echo "Database created successfully\n";
	} else {
	    echo "Error creating database: " . mysqli_error($connect);
	}
	mysqli_close($connect)
?>

<?php
	$connect = mysqli_connect("localhost", "root", "verybadpassword", "Animals");
	if (!$connect) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$result_sql = "CREATE TABLE IF NOT EXISTS User_info (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	username VARCHAR(20) NOT NULL UNIQUE KEY,
	password TEXT NOT NULL,
	admin BOOLEAN NOT NULL)";

	if (mysqli_query($connect, $result_sql)) {
	    echo "Table Basket created successfully";
	} else {
	    echo "Error creating table: " . mysqli_error($connect);
	}

	$result_sql = "CREATE TABLE IF NOT EXISTS Categories (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	name VARCHAR(150) NOT NULL)";
	if (mysqli_query($connect, $result_sql)) {
	    echo "Table Basket created successfully";
	} else {
	    echo "Error creating table: " . mysqli_error($connect);
	}

	create_category('cats', $connect);
	create_category('dogs', $connect);
	create_category('dolphins', $connect);
	create_category('otters', $connect);
	
	mysqli_close($connect);
?>

<?php

	$connect = mysqli_connect("localhost", "root", "verybadpassword", "Animals");
	if (!$connect) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$result_sql = "INSERT INTO Cats (numb, type, price, img, description)
	VALUES (1, 'Maine-coon', 10000, 'https://cdn3-www.cattime.com/assets/uploads/gallery/maine-coon-cats-and-kittens/maine-coon-cats-and-kittens-5.jpg', 'Крупнейшая порода, самцы которых весят от 5.9 до 8.2 кг, а самки от 3,6 до 5,4 кг. Высота взрослых кошек достигает от 25 до 41 см, а общая длина с хвостом до 120 см (длина хвоста до 36 см). Полный потенциальный размер кошки достигается в возрасте от 3 до 5 лет, в то время как у обычных кошек в возрасте 1 года. Особи имеют небольшие кисточки на кончиках ушей.');";

	$result_sql .= "INSERT INTO Cats (numb, type, price, img, description)
	VALUES (2, 'Siamese', 8000, 'https://i0.wp.com/www.wagpets.com/wp-content/uploads/2016/10/image-result-for-siamese-cats.jpeg', 'Это - кот.');";

	$result_sql .= "INSERT INTO Cats (numb, type, price, img, description)
	VALUES (3, 'Ragdoll', 12000, 'http://elelur.com/data_images/cat-breeds/ragdoll-cat/ragdoll-cat-07.jpg', 'Экран 15.6 IPS (1920x1080) Full HD, матовый / Intel Core i7-8550U (1.8 - 4.0 ГГц) / RAM 8 ГБ / HDD 1 ТБ / nVidia GeForce GTX 1050, 4 ГБ / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / Endless OS / 1.96 кг / черный');";
	$result_sql .= "INSERT INTO Dolphins (numb, type, price, img, description)
	VALUES (1, 'Striped-dolphin', 25000, 'https://dolphin-academy.com/assets/images/_320x360_crop_center-center/SD2.jpg', 'Недостаточно изученный малый дельфин, встречающийся в умеренных и тропических водах по всему мировому океану. Питается рыбой, крилем, осьминогами. Внешний вид отличается от других дельфинов наличием боковых полос. До введения квот страдал от промысла со стороны японцев, сейчас страдает от сетей, а также шумов и загрязнения (средиземноморская популяция).');";
	$result_sql .= "INSERT INTO Dolphins (numb, type, price, img, description)
	VALUES (2, 'River-dolphins', 20000, 'https://2.bp.blogspot.com/-N2sYoCcJTbU/UgfBVLFcpGI/AAAAAAAAEzk/v-cibtNzn-w/s1600/PinkDolphin4.jpg', 'Речные дельфины находятся на грани вымирания из-за потери мест обитания, небольших популяций и вследствие охоты на них людьми. Кроме того, речные дельфины обладают крайне плохим зрением, что служит причиной многочисленных столкновений с людьми и теми искусственными объектами, которые им сложно обнаружить при помощи своего сонара.');";
	$result_sql .= "INSERT INTO Dolphins (numb, type, price, img, description)
	VALUES (3, 'White-sided-dolphin', 22000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQUvS0SMP6ETOcwr_rR8PbH07oOBnAvIFZwYqfD3u_XwKEE4YWQvg', 'Величина атлантического белобокого дельфина составляет максимум 2,8 м у самцов и 2,5 м у самок. Этот вид несколько крупнее чем большинство других видов дельфинов. Его вес составляет 200—230 кг. Основным отличием атлантического белобокого дельфина является большое белое либо жёлтое пятно, начинающееся по обе стороны от спинного плавника и тянущееся вдоль всего тела. Нижняя сторона головы, горло и живот этих животных окрашены в белый цвет, а плавники и спина — в чёрный.');";
	$result_sql .= "INSERT INTO Otters (numb, type, price, img, description)
	VALUES (1, 'River-otter', 15000, 'https://www.oregonzoo.org/sites/default/files/styles/article-half/public/2016/04/20/V_river-otter-Mo.jpg', 'Окраска меха: сверху тёмно-бурая, снизу светлая, серебристая. Остевые волосы грубые, но подпушь очень густая и нежная. Высокая плотность подшерстка делает мех непроницаемым для воды и прекрасно изолирует тело животного, защищая его от переохлаждения. Строение тела выдры приспособлено для плавания под водой: плоская голова, короткие лапы, длинный хвост.');";
	$result_sql .= "INSERT INTO Otters (numb, type, price, img, description)
	VALUES (2, 'Sumatran-otter', 20000, 'http://www.thehallofeinar.com/wp-content/uploads/2017/11/Asian-Short-Clawed-Otter-The-Hall-of-Einar-5014.jpg', 'Суматранская выдра длиной примерно 1,3 м, вес составляет около 7 кг. Между пальцами с когтями имеются плавательные перепонки. Шерсть на спине тёмно-коричневого окраса, на брюхе немного светлее. Подбородок и верхняя губа белёсые. Поверхность вокруг ноздрей носа и носовая перегородка волосатые.');";
	$result_sql .= "INSERT INTO Dogs (numb, type, price, img, description)
	VALUES (1, 'Labrador Retriever', 10000, 'https://i.pinimg.com/originals/99/f9/ed/99f9ede31328c8484e9e252d08811535.jpg', 'Крепкого сложения, сбитый, энергичный; широкая черепная коробка; широкая и глубокая грудь в рёбрах; поясница и задняя часть широкие и крепкие.

Череп широкий. Чётко очерчен без мясистых скул. Переход ото лба к морде выражен. Мочка носа широкая, ноздри хорошо развиты. Морда массивная, необлегчённая. Челюсти средней длины, весьма мощные, но очень мягкие, челюсти и зубы крепкие с совершенным, правильным и полностью ножницеобразным прикусом, то есть верхние зубы плотно перекрывают нижние зубы и стоят перпендикулярно челюстям. Глаза средней величины, выражающие ум и хороший характер; коричневые или ореховые. Уши не крупные и не тяжёлые; висячие, прилегающие к голове, посажены довольно далеко сзади. Шея сухая, крепкая, массивная, посажена в хорошо расположенные плечи.');";
	$result_sql .= "INSERT INTO Dogs (numb, type, price, img, description)
	VALUES (2, 'Beagle', 90000, 'http://totallydogtraining.com/wp-content/uploads/2018/01/lemon-beagle.jpg', 'Среднего размера, внешне сходна с фоксхаундом, но мельче, с более короткими ногами и более длинными и мягкими ушами (по стандарту породы уши должны доходить до кончика носа). Рост — от 33 до 40 см в холке, вес — между 9 и 11 кг, суки мельче кобелей. Бигли обладают хорошим обонянием и используются прежде всего для охоты на кроликов и зайцев, очень часто используются на таможне для поиска взрывчатых веществ. Бигли очень активные и шаловливые. Обучение и воспитание биглей сложное, они требуют постоянных тренировок.');";
	$result_sql .= "INSERT INTO Dogs (numb, type, price, img, description)
	VALUES (3, 'Cane-Corso', 12000, 'https://www.europuppy.com/wp-content/uploads/shutterstock_2288032331.jpg', 'Ка́не-ко́рсо (итал. Cane corso italiano) — порода собак, одна из самых древних представителей группы молоссов, первые упоминания о которой появились в глубокой древности. Официальными предками считаются древнеримские боевые собаки, использовавшиеся в качестве травильных собак-гладиаторов. После распада Римской империи нить истории этого римского молосса прерывается вплоть до начала средневековья. За это время молоссы получили широкое распространение по всей Европе, о чём свидетельствуют многочисленные гравюры и полотна.');";
	$pass_admin = hash('whirlpool', 'admin');
	$result_sql .= "INSERT INTO User_info (username, password, admin) VALUES ('admin', '$pass_admin', true);";
	$result_sql .= "INSERT INTO Cats (numb, type, price, img, description)
	VALUES (3, 'Котопёс', 30, 'https://irecommend.ru/sites/default/files/product-images/11006/tumblr_krjnka6cql1qzlov6o1_400.jpg', 'Это кот? Может быть, это пёс? Нет, это - котопёс!');";
	$result_sql .= "INSERT INTO Dogs (numb, type, price, img, description)
	VALUES (3, 'Котопёс', 30, 'https://irecommend.ru/sites/default/files/product-images/11006/tumblr_krjnka6cql1qzlov6o1_400.jpg', 'Это кот? Может быть, это пёс? Нет, это - котопёс!');";
	

	if (mysqli_multi_query($connect, $result_sql)) {
	    echo "New records created successfully";
	} else {
	    echo "Error: " . $result_sql . "<br>" . mysqli_error($connect);
	}
	mysqli_close($connect);
?>