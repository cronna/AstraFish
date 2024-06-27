<?php

use yii\db\Migration;

/**
 * Class m240624_061008_MainMigrate
 */
class m240624_061008_MainMigrate extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'login' => $this->string()->notNull(),
            'password' => $this->string()->notNull()
        ]);
        $this->createTable('books', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'category_id' => $this->integer()->notNull(),
            'author_id' => $this->integer()->notNull(),
            'deliv_date' => $this->date(),
            'img' => $this->string()->notNull(),
            'avail' => $this->boolean()->defaultValue(true),
            'art' => $this->integer()->notNull()   
        ]);
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()
        ]);
        $this->addForeignKey(
            'books_to_category_fk',
            'books',
            'category_id',
            'categories',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->createTable('authors', [
            'id' => $this->primaryKey(),
            'fio' => $this->string()->notNull()
        ]);
        $this->addForeignKey(
            'books_to_author_fk',
            'books',
            'author_id',
            'authors',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createTable('staff', [
            'id' => $this->primaryKey(),
            'fio' => $this->string()->notNull(),
            'post' => $this->string()->notNull()
        ]);

        $this->createTable('clients', [
            'id' => $this->primaryKey(),
            'fio' => $this->string()->notNull(),
            'passport_series' => $this->integer()->notNull(),
            'passport_number' => $this->integer()->notNull(),
            'book' => $this->boolean()->defaultValue(false)
        ]);

        $this->createTable('distributions', [
            'id' => $this->primaryKey(),
            'date' => $this->date()->notNull(),
            'book_id' => $this->integer()->notNull(),
            'staff_id' => $this->integer()->notNull(),
            'client_id' => $this->integer()->notNull(),
            'term' => $this->integer()->notNull()
        ]);

        $this->addForeignKey(
            'dist_to_books_fk',
            'distributions',
            'book_id',
            'books',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'dist_to_staff_fk',
            'distributions',
            'staff_id',
            'staff',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'dist_to_client_fk',
            'distributions',
            'client_id',
            'clients',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->createTable('refunds', [
            'id' => $this->primaryKey(),
            'date' => $this->date(),
            'book_id' => $this->integer()->notNull(),
            'staff_id' => $this->integer()->notNull(),
            'condition_id' => $this->integer()
        ]);

        $this->addForeignKey(
            'refunds_to_book_fk',
            'refunds',
            'book_id',
            'books',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'refunds_to_staff_fk',
            'refunds',
            'staff_id',
            'staff',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createTable('conditions', [
            'id' => $this->primaryKey(),
            'condition' => $this->string()->notNull()
        ]);
        $this->addForeignKey(
            'refunds_to_condition_fk',
            'refunds',
            'condition_id',
            'conditions',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->insert('users', [
            'login' => 'admin',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
        ]);

        $this->insert('conditions', [
            'condition' => 'Ужасное'
        ]);
        $this->insert('conditions', [
            'condition' => 'Плохое'
        ]);
        $this->insert('conditions', [
            'condition' => 'Нормальное'
        ]);
        $this->insert('conditions', [
            'condition' => 'Хорошее'
        ]);
        $this->insert('conditions', [
            'condition' => 'Отличное'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240624_061008_MainMigrate cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240624_061008_MainMigrate cannot be reverted.\n";

        return false;
    }
    */
}
