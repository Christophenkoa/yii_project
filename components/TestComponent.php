<?php

namespace app\components;

class TestComponent extends \yii\base\Component {
    
    public function hello() {
        echo '<pre><br><br>';
            var_dump('Test component');
        echo '</pre>';
    }
}