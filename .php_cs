<?php

$rules = [
    '@PSR2'             => true,
    'array_syntax'      => ['syntax' => 'short'],
    'ordered_imports'   => ['sortAlgorithm' => 'alpha'],
    'no_unused_imports' => true,

    'binary_operator_spaces'       => ['default' => 'align_single_space_minimal'],
    'blank_line_after_opening_tag' => true,
    'blank_line_before_statement'  => true,
    'class_attributes_separation'  => ['elements' => ['method', 'property']],
    'concat_space'                 => ['spacing' => 'one'],
    'declare_equal_normalize'      => ['space' => 'single'],
//        'dir_constant' => true,   // risky
    'fully_qualified_strict_types' => true,
    'function_declaration'         => ['closure_function_spacing' => 'none'],
    'function_typehint_space'      => true,
    'include'                      => true,

//        'is_null' => true,
    'list_syntax'                 => ['syntax' => 'short'],
    'lowercase_cast'              => true,
    'lowercase_static_reference'  => true,
    'magic_constant_casing'       => true,
    'method_separation'           => true,
    'method_chaining_indentation' => true,
//        'modernize_types_casting' => true
    'native_function_casing'             => true,
    'normalize_index_brace'              => true,
    'object_operator_without_whitespace' => true,
    'phpdoc_align'                       => true,
    'phpdoc_annotation_without_dot'      => true,
    'phpdoc_indent'                      => true,
    'phpdoc_inline_tag'                  => true,
    'phpdoc_no_access'                   => true,
//    'phpdoc_no_package'                  => true,
    'phpdoc_no_empty_return'             => true,
    'phpdoc_no_useless_inheritdoc'       => true,
    'phpdoc_return_self_reference'       => true,
    'phpdoc_scalar'                      => true,
    'phpdoc_separation'                  => true,
    'phpdoc_single_line_var_spacing'     => true,
    'phpdoc_to_comment'                  => true,
    'phpdoc_trim'                        => true,
    'phpdoc_types'                       => true,
    'phpdoc_var_without_name'            => true,
    'return_type_declaration'            => true,
    'short_scalar_cast'                  => true,
    'single_blank_line_before_namespace' => true,
//    'single_line_comment_style'                   => true,
    'single_quote'                      => true,
    'space_after_semicolon'             => true,
    'standardize_not_equals'            => true,
    'ternary_operator_spaces'           => true,
    'ternary_to_null_coalescing'        => true,
    'trailing_comma_in_multiline_array' => true,
    'trim_array_spaces'                 => true,
    'unary_operator_spaces'             => true,
    'whitespace_after_comma_in_array'   => true,
];

$excludes = [
    'bootstrap',
    'vendor',
    'storage',
    'node_modules',
    'resources',
    'public',
];

$finder = Symfony\Component\Finder\Finder::create()
    ->in(__DIR__)
    ->exclude($excludes)
    ->name('*.php')
    ->notName('_ide_helper')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return PhpCsFixer\Config::create()
    ->setRules($rules)
    ->setFinder($finder);
