<?php

use Give\Framework\FieldsAPI\Form;
use Give\Framework\FieldsAPI\Text;
use PHPUnit\Framework\TestCase;

final class RemoveNodeTest extends TestCase {

    public function testRemoveNode() {
        $form = Form::make( 'form' )->append(
            Text::make( 'firstTextField' ),
            Text::make( 'secondTextField' )
        );

        $form->remove( 'secondTextField' );

        $this->assertEquals( 1, $form->count() );
    }
}
