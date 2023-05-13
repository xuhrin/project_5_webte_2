# project_5_webte_2
Semester project from the subject web technology 2   FEI/STU. (Group project)

## Composer install through docker

```sh
docker run --rm --interactive --tty -v $(pwd):/app composer install
```

It may be required to change owner of vendor folder:

```sh
sudo chown NEW_OWNER:NEW_OWNER -R vendor
```

## Edit `.env`

Create `.env` file from `.env.example`

```sh
cp .env.example .env
```

## Create alias

```sh
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

## Launch all containers

```sh
./vendor/bin/sail up -d
```

## Modify `.env`

Set `DB_HOST` in `.env` to real `MySQL` host.

## Migrate database

```sh
./vendor/bin/sail artisan migrate
```

## Stop all containers

```sh
./vendor/bin/sail down
```

## Remove all containers

```sh
./vendor/bin/sail down --rmi all
```

## Remove all untracked files `git`

```sh
git clean -fdx
```
