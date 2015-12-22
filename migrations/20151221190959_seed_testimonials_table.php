<?php

use Phinx\Migration\AbstractMigration;

class SeedTestimonialsTable extends AbstractMigration
{
  public function up()
  {
    $this->execute("
        insert into testimonials (title, testimonial, user_id)
        values
        ('Testimonial', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,', '1')
    ");
  }

  public function down()
  {

  }
}
