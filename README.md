0) Скачать и установить OpenServer с PostgreSQL.
1) Если в модулях не установлен PostgrSQL, то необходимо поставить какую-нибудь версию 
	OpenServer->Настройки->Модули.
2) Настроить домен: 
	2.1) Зайти в OpenServer->Настройки->Домены и в пункте управление доменами 
		поставить (Ручное управление).
	2.2) выбрать имя домена и папку (Photogallery/public).
3) Восстановить резервную копию базы данных (photogallery.dump): psql имя_базы < photogallery.dump
4) Настроить параметры в файле (parameters.ini).