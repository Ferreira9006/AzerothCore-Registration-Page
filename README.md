# AzerothCore Registration Page

This project provides a user-friendly registration page for the [AzerothCore](https://github.com/azerothcore/azerothcore-wotlk) server, allowing players to create accounts easily. Designed to integrate seamlessly with AzerothCore, this registration page offers a straightforward and secure way to register new accounts.

## Features
- User registration with basic validation
- Integration with AzerothCore's account database
- Secure password hashing
- Error handling and user feedback

## Requirements
Before using this registration page, ensure that your server has the following PHP extensions enabled:

- **GMP Extension**: Required for working with large integers and cryptographic functions.
- **Mbstring Extension**: Provides multi-byte string handling, necessary for proper string manipulation.
- **PDO Extension**: Enables PHP Data Objects for database access.
- **PDO-MySQL Extension**: PDO driver for MySQL databases, required for connecting to the AzerothCore database.

## Installation
1. Clone the repository to your web server.
2. Ensure all required PHP extensions are enabled.
3. Configure the `config.php` file with your database and server details.
4. Deploy the registration page to your web server.
5. Direct users to the registration page to start creating accounts.

## Credits
- **Project Creator**: [Gabriel Ferreira](https://github.com/ferreira9006)
- **AzerothCore**: [AzerothCore Community](https://github.com/azerothcore)

## Contributors
We welcome contributions from the community! If you'd like to contribute, please fork the repository, make your changes, and submit a pull request.

### Current Contributors
- [Gabriel Ferreira](https://github.com/ferreira9006) - Initial development
