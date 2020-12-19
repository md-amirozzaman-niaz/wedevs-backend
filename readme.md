### Instruction ###

Run this command to clone
```
git clone https://github.com/md-amirozzaman-niaz/wedevs-backend.git --recurse
-submodules
```

Run for composer command
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

Migrate database and seed command

```
php artisan migrate:fresh --seed
```

default user: `admin@demo.com`
password:`password`

