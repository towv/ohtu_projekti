Feature: User can log in with valid username/password-combination

    Scenario: user can login with correct password
       Given kirjaudu sisaan is pressed
       When  username "pekka" and password "akkep" are entered
       Then  system will respond with "logged in"