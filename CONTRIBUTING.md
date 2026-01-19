# Contributing to Bookwise

## Atomic Commits & Quality Standards

We follow a strict **Atomic Commit** philosophy. Each commit should represent a single logical change that is complete and verifiable.

### Commit Message Convention

We use [Conventional Commits](https://www.conventionalcommits.org/):

```
type(scope): subject

- detailed description point 1
- detailed description point 2
```

#### Types
- `feat`: A new feature
- `fix`: A bug fix
- `docs`: Documentation only changes
- `style`: Changes that do not affect the meaning of the code (white-space, formatting, etc)
- `refactor`: A code change that neither fixes a bug nor adds a feature
- `perf`: A code change that improves performance
- `test`: Adding missing tests or correcting existing tests
- `chore`: Changes to the build process or auxiliary tools and libraries such as documentation generation

### Examples from our History

**Feature:**
```
feat(auth): implement login with google

- Add Google OAuth client dependency
- Create GoogleLoginController
- Update login view with "Sign in with Google" button
```

**Refactor:**
```
refactor(core): centralized database connection

- Move PDO instantiation to Database class factory
- Remove direct localized connections in controllers
- Update config.php with centralized credentials
```

### Pull Request Process

1. Ensure your code is formatted (`./vendor/bin/pint`).
2. Ensure you have no "Working In Progress" code commits.
3. Squash trivial "fix typo" commits before merging.
