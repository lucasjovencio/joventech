# Sobre JovenTech

JovenTech é uma plataforma com formato de um site intitucional com um blog e um painel admin para gerenciamento, desenvolvido com Laravel com objetivo de disponibilizar um projeto para comunidade e colocar meus projetos pessoais em visibilidade. 


## Com docker

Com auxilio de um docker [Docker](https://github.com/lucasjovencio/docker-laravel) desenvolvido com o meu amigo [Eduardo Araya](https://github.com/eduardoaraya), para ter um ambiente que suporta o projeto em todas as maquinas. Caso tenha duvida de como instalar o docker você pode acessar [Docs Docker](https://docs.docker.com/desktop/).

## Configurando o docker
- Faça um fork e clone no seu computador [Docker](https://github.com/lucasjovencio/docker-laravel).
- Configure o env com as variaveis de acesso do docker.
- Faça um fork desse projeto.
- Cole a url do seu fork na variável url de .gitmodules. 

## Execute os commandos na ordem, na raiz do projeto.
- git submodule update --init --recursive
- Configure o .env do laravel com as conexões da base de dados mysql e redis do docker.
- docker-composer up -d
- docker exec -it laravel bash
- composer install --optimize-autoloader
- php artisan dev:install
- digite http://localhost/ no navegador e veja se o projeto está funcionando.



## About Laravel
Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
