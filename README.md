# Backend Challenge 20230105

# Introdução

Nesse desafio, foi feito o desenvolvimento de uma REST API para utilizar os dados do projeto Open Food Facts, que é um banco de dados aberto com informação nutricional de diversos produtos alimentícios.

Em resumo, neste projeto foi feito um trabalho completo de desenvolvimento de uma aplicação web. Foram criados endpoints de uma REST API, integrados com a API Open Food Facts para obter e processar dados, e integrados com um banco de dados relacional para persistir esses dados.

Além disso, foi implementado um sistema de agendamento de tarefas com o uso de Cron Schedule para garantir a execução de tarefas de forma assíncrona e automática, sem a necessidade de intervenção manual.

E para assegurar a qualidade e integridade do código, foram implementados testes unitários em todas as etapas do processo de desenvolvimento. Isso garantiu que a aplicação estivesse funcionando corretamente em todas as situações e possibilitou uma maior confiança na entrega do produto final.

>  This is a challenge by [Coodesh](https://coodesh.com/)

# Tecnologias utilizadas
Este projeto foi desenvolvido utilizando a linguagem de programação PHP em conjunto com o framework Laravel, especificamente utilizando o Laravel Sail, que oferece uma ampla gama de recursos e ferramentas para o desenvolvimento de aplicações web modernas e escaláveis em um ambiente de desenvolvimento Dockerizado.

Para armazenar os dados da aplicação, foi utilizado o banco de dados relacional MySQL, que é amplamente utilizado em projetos de grande porte.

A implementação de testes unitários é uma prática importante no desenvolvimento de software que permite garantir a qualidade e integridade do código produzido. Com isso, é possível garantir que a aplicação funcione corretamente em diferentes situações e que os resultados obtidos sejam os esperados.

Para simular um ambiente realista e testar a aplicação de forma mais eficiente, foi utilizado o recurso de seeder do Laravel juntamente com a factory, que permite preencher o banco de dados com dados fictícios de forma automatizada. Essas ferramentas foram utilizadas exclusivamente nos testes do projeto."

# Implementação da integração com a API Open Food Facts
A API em questão lida com arquivos compactados no formato gz e requer que o processo de download e leitura dos dados seja otimizado para garantir a eficiência do sistema. Para isso, o projeto utiliza um sistema de cron schedule que permite que o processo seja executado de forma assíncrona em intervalos regulares.

Em primeiro lugar, é necessário obter uma lista com os nomes dos arquivos disponíveis para download. Em seguida, o sistema de cron schedule inicia o processo de download dos arquivos individualmente. Uma vez baixado, o arquivo compactado é salvo no disco e, em seguida, descompactado em um processo separado, permitindo que a CPU seja liberada para outras tarefas enquanto a descompactação é realizada em segundo plano.

Para minimizar o impacto no desempenho do sistema, é possível ler apenas um número limitado de linhas do arquivo descompactado e salvá-las em um novo arquivo, evitando assim sobrecarga da memória. 

Após o processo de download e leitura dos arquivos ser concluído, os dados são armazenados na memória do sistema. Em seguida, é realizada a validação dos dados para garantir a integridade e qualidade das informações.

Após a validação, os dados são salvos na base de dados. Esse processo envolve a transformação dos dados em um formato adequado para o armazenamento em banco de dados.

# Como instalar e usar o projeto (instruções)

## Instalação e Execução

### Para instalar e executar o projeto, siga as seguintes etapas:

1. Clone o projeto em seu ambiente local:
```bash
git@github.com:marcelocoelhojr/backend-challenge-coodesh.git
```
2. Certifique-se de que você tem o Docker instalado em seu sistema.
3. Na raiz do projeto, crie o arquivo .env a partir do arquivo .env.example:
4. Edite o arquivo .env para configurar as variáveis de ambiente necessárias para o projeto, como informações de conexão do banco de dados e credenciais de autenticação.
5. Na raiz do projeto, execute o seguinte comando para baixar as dependências do projeto:
```bash
composer install
```
6. Na raiz do projeto, execute o seguinte comando para iniciar o projeto:
```bash
./vendor/bin/sail up
```
### Sistema de filas
No projeto, foi implementado o sistema de filas do Laravel, que permite executar tarefas assíncronas em segundo plano. Isso é especialmente útil para processar tarefas que requerem muito tempo e recursos, como é o caso da manipulação de arquvios deste projeto.

Execute o seguinte comando para iniciar o sistema de filas:
```bash
./vendor/bin/sail artisan queue:work
```

### Sistema cron
Foi definido o horário das 3h da manhã como o melhor horário para execução do cron. No entanto, caso você queira testar a execução do cron em outro horário, basta acessar o arquivo app/Console/Kernel.php e alterar a função dailyAt() para everyMinute(). Dessa forma, o cron será executado a cada minuto, permitindo que você teste a funcionalidade de forma mais rápida e eficiente.

Execute o seguinte comando para iniciar o cron schedule:
```bash
./vendor/bin/sail artisan schedule:work
```

### Testes unitários
Execute o seguinte comando para iniciar os testes:
```bash
./vendor/bin/sail artisan test
```

### Endpoints
Detalhes da API, se conexão leitura e escritura com a base de dados está OK, horário da última vez que o CRON foi executado, tempo online e uso de memória.
```bash
GET /
```
Responsável por receber atualizações do Projeto Web.
```bash
PUT /products/:code 
```
Mudar o status do produto para trash.
```bash
DELETE /products/:code
```
Obter a informação somente de um produto da base de dados.
```bash
GET /products/:code
```
Listar todos os produtos da base de dados.
```bash
GET /products
```