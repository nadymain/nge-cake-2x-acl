<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
?>
<?php 
    $this->set('title', 'Oops!');
    echo $this->Html->meta(
		array(
			'name' => 'robots', 
			'content' => 'noindex, follow'
		), 
		null, 
		array('inline' => false)
	);
?>
<div class="oops">
    <p class="oops_message">
        <?php echo $message; ?> ...
    </p>
    <?php echo $this->Html->link(
        __('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>'), 
        'javascript:history.back()', 
        array(
            'class' => 'error_back',
            'title' => 'Back' , 
            'escape' => false
        )
    ) ?>
</div>
<?php
if (Configure::read('debug') > 0):
	echo $this->element('exception_stack_trace');
endif;
?>
