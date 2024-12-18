# DDD PHP - Projeto de Exemplo

DDD PHP - Arquitetura e Estrutura de Diretórios
Este projeto segue os princípios do Domain-Driven Design (DDD), um padrão arquitetural que visa organizar o código com base no domínio do negócio. A estrutura de diretórios foi pensada para refletir esses conceitos, facilitando a manutenção e escalabilidade do sistema.
## Requisitos

PHP: 7.4
Composer: 2.x ou superior

## Estrutura de Diretórios
A estrutura do projeto segue o padrão do Domain-Driven Design (DDD) e usa o autoloading do Composer para carregar as classes automaticamente.


```bash
/ddd-php
  /domain
    /Entities
    /Exceptions
    /Factories
    /Repositories
      /Implementation
      /OrderRepository.php
    /Services
    /Usecases
    /Value-objects
  /vendor
  /composer.json
  /execute.php

```

## Configuração do Autoloading no composer.json
O arquivo composer.json está configurado para utilizar o autoloading no padrão PSR-4, o que significa que todas as classes no namespace Domain são mapeadas para o diretório domain/ do projeto.

```json
{
  "autoload": {
    "psr-4": {
      "Domain\\": "domain/"
    }
  }
}

```

## Como Rodar o Projeto
1. Instalar Dependências
   Primeiro, instale as dependências do Composer:

```bash
composer install
```

Isso irá instalar todas as dependências necessárias e criar o diretório vendor.

2. Gerar Arquivos de Autoload
   O Composer gera automaticamente um arquivo de autoload, mas pode ser necessário gerar o autoload otimizado para garantir que todas as classes sejam carregadas corretamente.

Execute o comando abaixo para gerar os arquivos de autoload:

```bash
composer dump-autoload -o
```

3. Rodar o Projeto
   Após as dependências serem instaladas e o autoload ser configurado, você pode executar o script execute.php para testar a execução do projeto:

```bash
php execute.php
      
Saída:

Ordem com ID: 1234 salva.
Ordem criada com ID: 1234


```

# Estrutura do Projeto
A estrutura do seu projeto está organizada da seguinte maneira:

### 1. /domain
   O diretório /domain contém o núcleo do seu sistema, o "domínio". Este é o lugar onde as regras de negócios e a lógica central do sistema são implementadas, isoladas de detalhes como infraestrutura e interfaces de usuário. A pasta /domain está estruturada de forma a refletir as várias camadas do DDD.

### 2. /entities
As entidades representam objetos com identidade própria, geralmente com um ciclo de vida contínuo. Elas contêm a lógica de negócios associada e são persistidas no banco de dados.

`Exemplo: Order.php, Product.php`
Entidades podem ter comportamentos complexos associados, como regras de validação ou operações que afetam seu estado.

### 3. /exceptions
Este diretório contém as exceções específicas do domínio, que são lançadas quando ocorre algum erro dentro da lógica de negócios. As exceções personalizadas ajudam a tornar o sistema mais robusto e expressivo, permitindo que erros de negócios sejam tratados de forma apropriada.

`Exemplo: InvalidDiscountException.php, InvalidPriceException.php`

### 4. /factories
As fábricas são responsáveis pela criação de objetos complexos. Elas encapsulam a lógica de criação de instâncias de objetos do domínio, garantindo que todas as dependências sejam corretamente injetadas.

`Exemplo: OrderFactory.php`

### 5. /repositories
Os repositórios são responsáveis por abstrair o acesso e manipulação dos dados persistidos. Eles fornecem métodos para buscar, armazenar e remover entidades do banco de dados. No DDD, o repositório permite que o domínio se concentre na lógica de negócios, sem se preocupar com detalhes de implementação do armazenamento de dados.

`Exemplo: OrderRepositoryInterface.php, ProductRepositoryInterface.php`

### 6. /implementation
Este subdiretório contém as implementações dos repositórios definidos nas interfaces. Aqui, você pode ter implementações que interagem com diferentes fontes de dados, como bancos de dados relacionais, NoSQL, APIs externas, etc.

`Exemplo: OrderRepository.php (implementação do repositório)`

### 7. /services
Os serviços de domínio contêm a lógica de negócios que não pertence a uma entidade ou valor específico. Esses serviços são usados quando a operação envolve mais de uma entidade ou complexidade que justifica ser tratada em um serviço separado.

`Exemplo: OrderDiscountService.php`

### 8. /usecases
Os casos de uso representam as operações principais do sistema que o usuário ou o sistema chama para executar uma ação. Cada caso de uso reflete uma ação específica ou um processo do domínio que é central para o funcionamento do sistema.

`Exemplo: CreateOrderUseCase.php`
Esses arquivos contêm a orquestração da lógica de negócios e frequentemente interagem com as entidades e os repositórios para realizar operações completas.

### 9. /value-objects
Os objetos de valor representam conceitos do domínio que não têm identidade própria, mas são importantes para a lógica de negócios. Eles são imutáveis e podem ser usados como parte de entidades ou serviços.

`Exemplo: Price.php, Discount.php`

### 10. /vendor
   O diretório /vendor contém todas as dependências do projeto, que são gerenciadas pelo Composer. Esse diretório é criado automaticamente após a execução de composer install.

### 11. composer.json
   O arquivo composer.json contém as configurações do Composer, incluindo dependências, autoloading e outras configurações importantes. Ele usa o padrão PSR-4 para autoloading, que mapeia o namespace Domain\ para o diretório domain/, permitindo que o Composer carregue automaticamente as classes.

### 12.execute.php
   O arquivo execute.php é onde a execução do projeto ocorre. Esse arquivo pode ser usado para orquestrar a execução de casos de uso ou iniciar o processo de interação com o sistema. Ele pode chamar serviços, repositórios ou casos de uso diretamente, dependendo da lógica do sistema.

# Como Funciona a Arquitetura
## Domínio Centralizado
No DDD, o domínio é o foco principal. Isso significa que as entidades, exceções, serviços, repositórios e casos de uso estão todos organizados ao redor da lógica de negócios. O código de infraestrutura, como persistência de dados, comunicação de rede ou interfaces de usuário, é separado do domínio, o que garante que a lógica de negócios possa evoluir sem ser afetada por esses detalhes.

Entidades encapsulam dados e regras de negócios.
Exceções lidam com erros específicos do domínio.
Repositórios fornecem abstrações para o armazenamento de dados.
Serviços de Domínio são usados para lógica complexa.
Casos de Uso orquestram as operações principais do sistema, utilizando os repositórios e serviços.
Isolamento do Domínio
Ao adotar o DDD, garantimos que o domínio permaneça isolado de detalhes de implementação como banco de dados, API ou interface com o usuário. A comunicação com o mundo exterior ocorre através de casos de uso, que implementam a lógica necessária para orquestrar as interações entre o domínio e os serviços externos.

# PSR-4 Autoloading
A arquitetura usa o PSR-4 para autoloading, onde o Composer carrega automaticamente as classes com base nos namespaces. Isso significa que o PHP encontra e carrega as classes de acordo com o caminho do diretório, sem a necessidade de incluir manualmente os arquivos. O arquivo composer.json está configurado para usar o autoloading de PSR-4, permitindo que você defina namespaces para organizar melhor as classes dentro do seu projeto.