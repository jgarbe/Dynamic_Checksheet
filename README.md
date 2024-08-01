# Dynamic_Checksheet
LAMP server ajax checksheet for EMS or anything else.

This -- really -- is a mysql "front end" using LAMP server.  

Dynamic Checksheet is intended on running on a LAMP server.  I haven't tried NGinx, nor have I tried a WAMP server.

Step 1.  Set up a LAMP server. Linux,Apache2,Mysql(MariaDB),and PHP -- I heavily suggest installing "myphpadmin" as well.

Step 2.  Git clone to a directory on your server.  

  $ git clone https://github.com/jgarbe/Dynamic_Checksheet.git
  
Step 3. Create a database:
      If you have a hosting service, use the tools they offer to create a database.
      If using Debian or a home linux system, you must "su" to the root user first.
      
        $ su

then
      
        # mysql -u root -p

then        

    > create database <database_name>;

then    
    
    > grant all on <database_name>.* to <databaseusername>@localhost identified by '<password>';

and finally

    > exit;
    
Step 4. edit "Dynamic_Checksheet/inc/connectvars.php" 

    Change the mysql host, databasename, username, and password.
    
Step 5. edit "Dynamic_Checksheet/inc/appvars.inc.php."   
    Change to appropriate choices.
    
Step 6. Load the database.  
    Go to the "sql" directory.
    
     $cd Dynamic_Checksheet/sql
    
    
For the TN_ALS standard:
    
Edit the "demo_inv_01-23-2016.sql" file, deleting the example users in the _user table, but leaving the 'Administrator' and 'cheddar,' the other administrator.
      
      
      $mysql -u <databaseusername> -p<databasepassword> <databasename> < demo_inv_01-23-2016.sql   
    
    
NOTE: No space after the "-p" for the database password.  
    
Step 7.  Create a password for Administrator.

I wish I had a better way of doing this.  
Open the program as user:cheddar -- password: cheese and create a dummy user with your Administrator password.
Use phpmyadmin to copy the encrypted password from the user to the Administrator.
Now, you can delete the user and cheddar.
      
    

