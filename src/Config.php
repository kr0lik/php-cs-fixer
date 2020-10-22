<?php

declare(strict_types=1);

namespace kr0lik\CodeStyleFixer;

use PhpCsFixer\Config as BaseConfig;

class Config extends BaseConfig
{
    /**
     * @var string
     */
    protected $header;

    public function __construct($name = 'kr0lik CodeStyleFixer')
    {
        parent::__construct($name);

        $this->setRiskyAllowed(true)
            ->setUsingCache(false)
            ->setRules([
                '@PhpCsFixer' => true,
                'align_multiline_comment' => true,
                'array_indentation' => true,
                'array_syntax' => ['syntax' => 'short'],
                'comment_to_phpdoc' => true,
                'compact_nullable_typehint' => true,
                'date_time_immutable' => true,
                'declare_strict_types' => true,
                'dir_constant' => true,
                'ereg_to_preg' => true,
                'explicit_indirect_variable' => true,
                'explicit_string_variable' => true,
                'global_namespace_import' => [
                    'import_classes' => true,
                    'import_functions' => true,
                    'import_constants' => true,
                ],
                'is_null' => true,
                'linebreak_after_opening_tag' => true,
                'method_chaining_indentation' => true,
                'no_superfluous_phpdoc_tags' => [
                    'allow_mixed' => true,
                    'remove_inheritdoc' => false,
                    'allow_unused_params' => true,
                ],
                'no_unused_imports' => true,
                'no_useless_else' => true,
                'no_useless_return' => true,
                'nullable_type_declaration_for_default_null_value' => true,
                'ordered_class_elements' => true,
                'ordered_imports' => [
                    'imports_order' => ['class', 'function', 'const'],
                    'sort_algorithm' => 'alpha',
                ],
                'phpdoc_annotation_without_dot' => true,
                'phpdoc_no_useless_inheritdoc' => true,
                'phpdoc_order' => true,
                'phpdoc_summary' => false,
                'phpdoc_to_comment' => false,
                'phpdoc_trim_consecutive_blank_line_separation' => true,
                'phpdoc_types_order' => [
                    'null_adjustment' => 'always_last',
                    'sort_algorithm' => 'none',
                ],
                'phpdoc_var_without_name' => false,
                'return_assignment' => false,
                'simple_to_complex_string_variable' => true,
                'static_lambda' => true,
                'strict_comparison' => true,
                'strict_param' => true,
                'ternary_to_null_coalescing' => true,
                'void_return' => true,
                'no_short_echo_tag' => false,
                'no_alternative_syntax' => false,
                'class_attributes_separation' => true,
            ])
        ;
    }
}
