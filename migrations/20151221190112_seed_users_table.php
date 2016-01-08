<?php

use Phinx\Migration\AbstractMigration;

class SeedUsersTable extends AbstractMigration
{
  public function up()
  {
    $password_hash = password_hash('asdf', PASSWORD_DEFAULT);

    $this->execute("
        insert into users (first_name, last_name, email, password, active, access_level)
        values
        ('Pagchen', 'Kelsang', 'me@here.ca', '$password_hash', '1', '2')
    ");
  }

  public function down()
  {

  }
}
