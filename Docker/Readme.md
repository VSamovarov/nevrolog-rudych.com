# Настройка Docker в Windows

## Установка
- Windows 10 Prof
- Включить виртуализацию (Hyper-V)
- Установить Docker
- Расшарить диски
- **Запускать от администратора!**

## Make в Windows 10

Чтобы использовать **Makefile**

### Устанавливаем mingw32-make
- Качаем установщик [MinGW](https://sourceforge.net/projects/mingw/)
- Выбираем там mingw32-make (все файлы) устанавливаем
- По умолчанию C:\MinGW\bin\mingw32-make.exe

### Делаем алиас make  в PowerShell
Набирать *mingw32-make* - не интересно, потому делаем [короткий псевдоним **make**](https://stackoverflow.com/questions/24914589/how-to-create-permanent-powershell-aliases)

- Откройте Windows PowerShell ISE
- Создайте новй скрипт такого содержания ```New-Alias ${shortcutName} ${fullFileLocation}```
    ```
    New-Alias make C:\MinGW\bin\mingw32-make.exe
    ```
- Чтобы понять куда его сохранить, введите 
  ```echo $profile``` - покажет свой профиль пользователя PowerShell 
  
  Пример: ```E:\Samovarov\Documents\WindowsPowerShell\Microsoft.PowerShell_profile.ps1```. 

  Сохраняем.

- Теперь команды из **Makefile** запускаем так ```make docker-build``` (находимся в той же папке что и Makefile)

## Установка сертификата с помощью mkcert.exe
- установка mkcert
- генерация сертификатов
- настройка Nginx

### Установка mkcert под Windows
```scoop install mkcert```

[scoop](https://scoop.sh/) - это установщик командной строки для Windows. Его надо предварительно установить.

```
Invoke-Expression (New-Object System.Net.WebClient).DownloadString('https://get.scoop.sh')
```

Если выдало ошибку, выполняем такую команду пере этим

```
Set-ExecutionPolicy RemoteSigned -scope CurrentUser
```

Потом надо подключить [репозиторий](https://scoop.netlify.com/buckets/)
```
scoop bucket add extras
```

А потом уже ```scoop install mkcert```

### Генерация сертификатов
Тут все просто.

Создаем локальное хранилище (это два файла)
```
mkcert -install
```
Так можем узнать где оно создалось.
```
mkcert -CAROOT
```

Генерим сертификаты
```
mkcert yourcertname dev.local *.dev.local localhost 127.0.0.1 ::1
```

yourcertname - это имя сертификата

dev.local - это имя сервера

mkcert сгенерирует что-то вроде yourcertname+4-key.pem и yourcertname+4.pem в той же папке.

Копируем их в соответствующую папку в Docker


## Важные моменты

## Настройка Nginx
### Laravel, Symfony
- В первый Request параметр (GET) попадает вопросительный знак (?). 
  
    ```
    /integration/settings/3?company_id=4

    dd($request->all())

    array:1 [
        "?company_id" => "4"
    ]
    ```

    Чекаем [мануал](https://laravel.com/docs/5.6/deployment#server-configuration) о правильной настройке.

    Меняем
    ```
        location / {
            try_files $uri /index.php?$is_args$args
        }
    ```

    на

    ```
        location / {
            try_files $uri /index.php?$query_string;
        }
    ```
        
