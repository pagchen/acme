<?php

use Phinx\Migration\AbstractMigration;

class CreateTestimonialsTable extends AbstractMigration
{
  public function up()
  {
    $table = $this->table('testimonials');
    $table->addColumn('title', 'string')
      ->addColumn('testimonial', 'text')
      ->addColumn('user_id', 'integer')
      ->addForeignKey('user_id', 'users', 'id', ['delete' => 'cascade', 'update' => 'cascade'])
      ->addColumn('created_at', 'datetime', ['null' => true])
      ->addColumn('updated_at', 'datetime', ['null' => true])
      ->save();
  }

  public function down()
  {
    $this->dropTable('testimonials');
  }
}
