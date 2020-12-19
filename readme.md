### Instruction ###

Run this command to clone
```
git clone https://github.com/md-amirozzaman-niaz/wedevs-backend.git --recurse-submodules
```

Navigate to project folder and Run composer command
```
composer i
```
Generate key
```
php artisan key:generate
```
and 
```
php artisan jwt:secret
```

Run npm command

```
npm i
```

Build js
```
npm run dev
```

Configure `.env` file's database section

Run migration and seed command

```
php artisan migrate:fresh --seed
```
Start mysql server and run this command
```
php artisan serve
```
default user: `admin@demo.com`

password:`password`

