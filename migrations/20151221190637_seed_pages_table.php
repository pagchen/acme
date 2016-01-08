<?php

use Phinx\Migration\AbstractMigration;

class SeedPagesTable extends AbstractMigration
{
  public function up()
  {
      $this->execute("
          insert into pages (browsertitle, page_content)
          values
          ('About Acme', '<h1>About Acme</h1><p>All about this company</p>.', 'about-acme')
      ");
      $this->execute("
          insert into pages (browsertitle, page_content)
          values
          ('Success', '<h1>Success</h1><p>Welcome to Acme!</p>.', 'success')
      ");
      $this->execute("
          insert into pages (browsertitle, page_content)
          values
          ('Not Found', '<h1>Page Not Found!</h1><p>This page does not exist</p>.', 'page-not-found')
      ");
      $this->execute("
          insert into pages (browsertitle, page_content)
          values
          ('Account Activated', '<h1>Account now Active</h1><p>Your account is now active, you can log in.</p>.', 'account-activated')
      ");
      $this->execute("
          insert into pages (browsertitle, page_content)
          values
          ('Saved', '<h1>Testimonial Saved</h1><p>Your testimonial has been saved</p>.', 'testimonial-saved')
      ");

  }

  public function down()
  {

  }
}
