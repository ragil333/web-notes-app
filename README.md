# NOTES APP

# Features

>  Autentikasi menggunakan  [laravel sanctum](https://laravel.com/docs/10.x/sanctum)
>   Route menggunakan middleware auth:sanctum harus menyertakan token yang didapatkan ketika login, jika tidak maka api akan mengembalikan response unautgenticated
```
UNAUTHORIZED RESPONSE :
code : 401
{
	"message": "Unauthenticated."
}
```
>  Menggunakan Laravel Form Request [link](https://laravel.com/docs/10.x/validation#creating-form-requests)
>  Menggunakan Laravel Validation Dalam Form Request [link](https://laravel.com/docs/10.x/validation)
>  Mengunakan Laravel Route Controller, Group, prefix dan [Middleware](https://laravel.com/docs/10.x/middleware)
>  Enkripsi password menggunakan [Bcrypt](https://id.wikipedia.org/wiki/Bcrypt)
> Json Response
> Json Request
> Mengunakan Custom Trait ApiResponse app/Traits/ApiResponse.php
> Menggunakan [UUID](https://laravel.com/docs/10.x/eloquent#uuid-and-ulid-keys) sebagai ID untuk setiap Table
> Menggunakan Laravel [Eloquent Relationship](https://laravel.com/docs/10.x/eloquent-relationships#defining-relationships) HasMany, HasOne, BelongsTo
> Menggunakan Laravel [Eager Loading](https://laravel.com/docs/10.x/eloquent-relationships#eager-loading)
> Menggunakan Laravel [Form Validation Rule](https://laravel.com/docs/10.x/validation#available-validation-rules)

# JSON API RESPONSE CODE
login
```
endpoint => /api/auth/login
```
```
methods => POST
```
```
JSON REQUEST :
{
	"email": "usera@gmail.com",
	"password": "12345678"
}
```
> Note : email harus unique atau tidak boleh email yang sama, tidak boleh kosong dan harus diisi valid email
> Note : passwod wajid diisi dan minimal password adalah 8 karakter
> Note : jika ada validasi yang gagal maka response akan mengembalikan Validation error response
> 

```
CONTOH VALIDATION ERROR RESPONSE :
code : 422
{
	"message": "The email field must be a valid email address.",
	"errors": {
		"email": [
			"The email field must be a valid email address."
		]
	}
}
```
```
JSON RESPONSE :
{
	"message": "user authenticated",
	"user": {
		"id": "9a3810e7-10b1-4135-8c1f-1dd22d09acb5",
		"name": "user name",
		"email": "usera@gmail.com",
		"id_role": "9a378ec0-2e13-4ff1-ad51-a038c4a539cc",
		"email_verified_at": null,
		"created_at": "2023-09-25T15:32:04.000000Z",
		"updated_at": "2023-09-25T15:32:04.000000Z",
		"role": {
			"id": "9a378ec0-2e13-4ff1-ad51-a038c4a539cc",
			"kode_role": 3,
			"nama_role": "user",
			"created_at": "2023-09-25T09:28:08.000000Z",
			"updated_at": "2023-09-25T09:28:08.000000Z"
		}
	},
	"access_token": "26|2TC80NErGN2R1yj4UiZjLodG0QoDw0nIk1jr4gUa7f0c5bd2"
}
```

register 
```
endpoint => /api/auth/register
```
```
methods => POST
```
```
JSON REQUEST
{
	"kode_role": "3",
	"name": "user name",
	"email": "usedasdra@gmail.com",
	"password": "12345678",
	"password_confirmation": "12345678"
}
```
> Note : name harus diisi.
> Note : email harus unique atau tidak boleh email yang sama, tidak boleh kosong dan harus diisi valid email
> Note : untuk kode role 1 => admin, 2 => editor dan 3 user, jika salah akan mengembalikan validation error
> Note : passwod wajid diisi dan harus sama dengan password_confirmation dan minimal password adalah 8 karakter
> Note : jika ada validasi yang gagal maka response akan mengembalikan Validation error response

```
CONTOH VALIDATON ERROR RESPONSE :
code : 422
{
	"message": "The name field is required. (and 3 more errors)",
	"errors": {
		"name": [
			"The name field is required."
		],
		"email": [
			"The email field is required."
		],
		"password": [
			"The password field is required."
		],
		"kode_role": [
			"The kode role field is required."
		]
	}
}
```
```
JSON RESPONSE :
{
	"code": 201,
	"message": "success store data",
	"data": {
		"name": "user name",
		"email": "usedasdra@gmail.com",
		"password": "$2y$10$4L9Es3jHu64ugs3dP483DehcDkE4DoN0PLdHvQfmdDmPkMuXHKp8y",
		"id_role": "9a378ec0-2e13-4ff1-ad51-a038c4a539cc",
		"kode_role": "3"
	}
}
```
me untuk mendapatkan data use yang sudah terautentikasi
> Note : endpoint logout harus menyertakan token pada header karena endpoint ini akan mengembalikan data user sesuai token yang ada

```
endpoint => /api/auth/me
```
```
methods => GET
```
```
JSON RESPONSE
{
	"code": 302,
	"message": "success retrieve data",
	"data": {
		"id": "9a38d30b-f9d8-4d07-8840-b31d5425192f",
		"name": "user name",
		"email": "usedasdra@gmail.com",
		"id_role": "9a378ec0-2e13-4ff1-ad51-a038c4a539cc",
		"email_verified_at": null,
		"created_at": "2023-09-26T00:34:56.000000Z",
		"updated_at": "2023-09-26T00:34:56.000000Z",
		"role": {
			"id": "9a378ec0-2e13-4ff1-ad51-a038c4a539cc",
			"kode_role": 3,
			"nama_role": "user",
			"created_at": "2023-09-25T09:28:08.000000Z",
			"updated_at": "2023-09-25T09:28:08.000000Z"
		}
	}
}
```
logout
> Note : endpoint logout harus menyertakan token pada header karena ketika user logout maka akan me revoke atau membuat token menjadi invalid 

```
endpoints => /api/auth/logout
```
```
methods => POST
```
```
JSON RESPONSE : 
code : 200
{
	"message": "user logout"
}
```

# NOTES
> Note : karena endpoint /api/notes sudah dilindungi menggunakan middleware auth:sanctum maka untuk setiap request harus menyertakan token pada header setiap request menggunakan bearear token, token didapatkan ketika user melakukan login / autentikasi
> Note : token ada pada response saat berhasil login / autentikasi 
```
contoh : "access_token": "26|2TC80NErGN2R1yj4UiZjLodG0QoDw0nIk1jr4gUa7f0c5bd2"
```

semua notes
```
endpoint => /api/notes
```
```
methods => GET
```
> Note : jika user yang terautentikasi adalah admin maka akan mengembalikan data semua notes user dan jika user selain admin maka hanya akan mengembalikan notes sesuai dengan id user yang terautentikasi

```
JSON RESPONSE :
{
	"code": 302,
	"message": "success retrieve data",
	"data": [
		{
			"id": "9a383c04-5c94-490f-a256-4173d79d644c",
			"judul_notes": "dasda",
			"isi_notes": "adasdadasd",
			"id_user": "9a383af0-ff31-4c58-8ad3-eb5e47ca438e",
			"created_at": "2023-09-25T17:32:37.000000Z",
			"updated_at": "2023-09-25T17:32:37.000000Z",
			"user": {
				"id": "9a383af0-ff31-4c58-8ad3-eb5e47ca438e",
				"name": "test",
				"email": "test123@gmail.com",
				"id_role": "9a378ec0-2cfd-4413-a059-f9566140f5b9",
				"email_verified_at": null,
				"created_at": "2023-09-25T17:29:37.000000Z",
				"updated_at": "2023-09-25T17:29:37.000000Z"
			}
		},
		{
			"id": "9a383c1d-51ef-4a0f-9d0c-ca6834c86555",
			"judul_notes": "dasda",
			"isi_notes": "adasdadasd",
			"id_user": "9a383af0-ff31-4c58-8ad3-eb5e47ca438e",
			"created_at": "2023-09-25T17:32:54.000000Z",
			"updated_at": "2023-09-25T17:32:54.000000Z",
			"user": {
				"id": "9a383af0-ff31-4c58-8ad3-eb5e47ca438e",
				"name": "test",
				"email": "test123@gmail.com",
				"id_role": "9a378ec0-2cfd-4413-a059-f9566140f5b9",
				"email_verified_at": null,
				"created_at": "2023-09-25T17:29:37.000000Z",
				"updated_at": "2023-09-25T17:29:37.000000Z"
			}
		},
	    .....
	]
}
```

notes by notes id
```
endpoint => /api/notes/{id_notes}
```
```
method => GET
```
```
JSON RESPONSE :
{
	"code": 302,
	"message": "success retrieve data",
	"data": {
		"id": "9a383c04-5c94-490f-a256-4173d79d644c",
		"judul_notes": "dasda",
		"isi_notes": "adasdadasd",
		"id_user": "9a383af0-ff31-4c58-8ad3-eb5e47ca438e",
		"created_at": "2023-09-25T17:32:37.000000Z",
		"updated_at": "2023-09-25T17:32:37.000000Z"
	}
}
```
insert notes
```
endpoint => /api/notes
```
```
methods => POST
```
```
JSON REQUEST :
{
	"judul_notes": "judul notes",
	"isi_notes": "isi notes"
}
```
> Note : judul notes dan isi notes wajid d isi

```
JSON VALIDATION ERROR RESPONSE :
code : 422
{
	"message": "The judul notes field is required. (and 1 more error)",
	"errors": {
		"judul_notes": [
			"The judul notes field is required."
		],
		"isi_notes": [
			"The isi notes field is required."
		]
	}
}
```
```
JSON RESPONSE :
{
	"code": 202,
	"message": "success update data",
	"data": {
		"judul_notes": "judul notes",
		"isi_notes": "isi notes",
		"id_user": "9a378ec0-534a-4583-8ed6-ab08eba0a8d2",
		"id": "9a38e030-c52e-453d-8a64-02c89228c684",
		"updated_at": "2023-09-26T01:11:41.000000Z",
		"created_at": "2023-09-26T01:11:41.000000Z"
	}
}
```

edit notes
```
endpoints => /api/notes/{id_notes}
```
```
method => PUT
```
```
JSON REQUEST :
{
	"judul_notes": "judul notes UPDATE",
	"isi_notes": "isi UPDATE"
}
```
> Note : judul notes dan isi notes wajid d isi


```
JSON RESPONSE
{
	"code": 202,
	"message": "success update data",
	"data": {
		"id": "9a383c04-5c94-490f-a256-4173d79d644c",
		"judul_notes": "judul notes UPDATE",
		"isi_notes": "isi UPDATE",
		"id_user": "9a383af0-ff31-4c58-8ad3-eb5e47ca438e",
		"created_at": "2023-09-25T17:32:37.000000Z",
		"updated_at": "2023-09-26T01:17:10.000000Z"
	}
}
```
hapus notes
```
endpoints => /api/notes/{id_notesd}
```
```
methods => DELETE
```
```
JSON RESPONSE
{
	"code": 202,
	"message": "success delete data"
}
```

## Installation
NOTES APP requires [LARAVEL](https://laravel.com/).

# Clone git

```sh
git clone https://github.com/ragil333/web-notes-app.git
```

# Database
```
mysql -u root
create database note_app;
```

# Backend

masuk ke prject backend
```sh
cd backend-sanctum
```

ganti nama env.example menjadi .env
 ```
 mv env.example .env
 ```

buka .env dan sesuaikan konfigurasi database, username dan password
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=note_app
DB_USERNAME=root
DB_PASSWORD=toor
```

download dependecies
```
composer insall
```
migrasi database laravel
```
php artisan migrate
```
> Note: Pembuatan table dan relasi database menggunakan laravel migration

membuat data user admin dan role user
```
php artisan db:seed
```
> Note : Pembuatan User admin dan role user menggunakan database seeder laravel
> Note : default email : admin@gmail.com pass : 12345678
> Note : Untuk mengganti default email dan password admin ada pada role app/database/seeders/AdminSeeder.php
> Note : Untuk melihat user role ada pada app/database/seeders/UserRoleSeeder.php

menjalankan api backend-sanctum
```
php artisan serve --port 8000
```


# FRONT END WEBSITE

masuk ke prject frontend
```sh
cd front-end
```
ganti nama env.example menjadi .env
 ```
 mv env.example .env
 ```
download dependecies
```
composer insall
```

 # FEATURES
 > Custom middleware login sebagai admin untuk mengakses data user dan melihat semua notes
 > Custom middleware AuthenticateApi. berfungsi agar website hanya dapat diakses ketika sudah login dan terautentikasi dengan api
 > data user yang terautentikasi akan disimpan dalam session
 > Custom middleware AuthenticateGuest, berfungsi pada halaman login dan register
 > halaman login dan register hanya dapat diakses ketika tidak ada session
 > logout akan menghapus semua session website dan melakukan revoking token melewati api call
 > user logout akan redirect kehalaman login
 > semua input validasi terkoneksi dengan validasi yang ada pada api,
 > semua validation error message berasalah dari api
 > menampilkan alert success atau error ketika melakukan api call. seperti untuuk login dan register
 > menggunakan blade templating layout, @extend, @include, @yield, @section()
 > table user menggunakan datatables
 > karena menggunakan datatablse maka sudah terdapat fitur searh dan pagination
 > Responsive
 > saat menjalankan web front end pastilan API_URI sesuai dengan url api backend
 
 ```
    API_URI=127.0.0.1:8000/api/
 ```
 
 menjalankan front end website
 ```
 php artisan serve --port 8001
 ```
 
 
 
