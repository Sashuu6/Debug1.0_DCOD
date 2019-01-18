# Debugger
Debugger is a competition that checks your debugging skills. A person with good knowledge on algorithms can easily crack the competition. This competition checks your C programming skills too.

# Requirements
1. Machine running ubuntu.
2. GCC installed.
```
$ sudo apt install gcc
```
3. Apache server, PHP, phomyadmin and MySQL. To install these, refer [this link](https://www.sashwat.in/web/PHP-installation/).

# Working

This web app compiles the code from the server's gcc and creates an output on their name and question number. It also saves the number of compiles and if the code runs succesfully, it will record that too.

# Instructions
1. Clone the repository.
2. Place the file at web root (/var/www/html).
3. Open phpmyadmin and create a database named 'debug'.
4. Import the debug.sql file to the database.
5. Make sure all the credentials are correct at connection.php.

# Contributors
1. [Sashwat K](https://www.sashwat.in)
2. [Jishnu M](https://github.com/Jishnumax)