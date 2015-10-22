<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/Applications/MAMP/htdocs/gg/media/gantry5/engines/nucleus/particles/spacer.yaml',
    'modified' => 1444428965,
    'data' => [
        'name' => 'Spacer',
        'description' => 'Add empty column to the row.',
        'type' => 'spacer',
        'hidden' => false,
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Enabled',
                    'description' => 'Globally enable spacer.',
                    'default' => true
                ],
                '_info' => [
                    'type' => 'separator.note',
                    'class' => 'alert alert-info',
                    'content' => 'Add empty spacer column to the row. Shows up as an empty space in your layout.'
                ]
            ]
        ]
    ]
];
