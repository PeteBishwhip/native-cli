# NativePHP CLI

NativePHP CLI is a command-line tool to create and manage Laravel projects with NativePHP integration.

## Installation

To install NativePHP CLI, you need to have PHP and Composer installed on your system.

```sh
composer global require petebishwhip/native-cli:"^1@beta"
```

## Usage
To create a new Laravel project with NativePHP, use the new command:
```bash
nativecli new <project-name>
```

## Documentation
For more detailed documentation, visit [NativeCLI Documentation](https://nativecli.com).

## Options
- --**dev**: Installs the latest "development" release.
- --**git**: Initialize a Git repository.
- --**branch**: The branch that should be created for a new repository (default: main).
- --**github**: Create a new repository on GitHub.
- --**organization**: The GitHub organization to create the new repository for.
- --**database**: The database driver your application will use.
- --**stack**: The Breeze / Jetstream stack that should be installed.
- --**breeze**: Installs the Laravel Breeze scaffolding.
- --**jet**: Installs the Laravel Jetstream scaffolding.
- --**dark**: Indicate whether Breeze or Jetstream should be scaffolded with dark mode support.
- --**typescript**: Indicate whether Breeze should be scaffolded with TypeScript support.
- --**eslint**: Indicate whether Breeze should be scaffolded with ESLint and Prettier support.
- --**ssr**: Indicate whether Breeze or Jetstream should be scaffolded with Inertia SSR support.
- --**api**: Indicates whether Jetstream should be scaffolded with API support.
- --**teams**: Indicates whether Jetstream should be scaffolded with team support.
- --**verification**: Indicates whether Jetstream should be scaffolded with email verification support.
- --**pest**: Installs the Pest testing framework.
- --**phpunit**: Installs the PHPUnit testing framework.
- --**force**, -f: Forces install even if the directory already exists.

## License
This project is licensed under the MIT License.