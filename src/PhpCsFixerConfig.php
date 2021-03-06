<?php

namespace Riimu\PhpCsFixerConfig;

use PhpCsFixer\Config;
use Symfony\Component\Finder\Finder;

/**
 * PhpCsFixerConfig.
 * @author Riikka Kalliomäki <riikka.kalliomaki@gmail.com>
 * @copyright Copyright (c) 2018 Riikka Kalliomäki
 * @license http://opensource.org/licenses/mit-license.php MIT License
 */
class PhpCsFixerConfig
{
    /** @var string */
    private $rootDirectory = '';

    public function buildConfig(string $rootDirectory = null): Config
    {
        $this->rootDirectory = rtrim($rootDirectory ?? $this->detectRootDirectory(), '/');

        $config = Config::create();
        $config
            ->setUsingCache(false)
            ->setRiskyAllowed(true)
            ->setRules($this->getRules())
            ->setFinder($this->getFinder());

        return $config;
    }

    private function detectRootDirectory(): string
    {
        foreach (debug_backtrace(\DEBUG_BACKTRACE_IGNORE_ARGS) as $trace) {
            $file = (string) ($trace['file'] ?? '');

            if (basename($file) === '.php_cs') {
                return \dirname($file);
            }
        }

        throw new \RuntimeException('The configuration must be included via a .php_cs file');
    }

    private function getFinder(): Finder
    {
        $finder = \PhpCsFixer\Finder::create()
            ->in($this->rootDirectory . '/src');

        if (file_exists($this->rootDirectory . '/tests')) {
            $finder->in($this->rootDirectory . '/tests');
        }

        return $finder;
    }

    private function getRules(): array
    {
        return [
            '@PSR2' => true,

            'align_multiline_comment' => true,
            'array_indentation' => true,
            'array_syntax' => ['syntax' => 'short'],
            'backtick_to_shell_exec' => true,
            'binary_operator_spaces' => true,
            'blank_line_after_opening_tag' => true,
            'cast_spaces' => true,
            'class_attributes_separation' => ['elements' => ['method']],
            'combine_consecutive_issets' => true,
            'combine_consecutive_unsets' => true,
            'combine_nested_dirname' => true,
            'compact_nullable_typehint' => true,
            'concat_space' => ['spacing' => 'one'],
            'declare_equal_normalize' => true,
            'dir_constant' => true,
            'ereg_to_preg' => true,
            'fopen_flag_order' => true,
            'fopen_flags' => true,
            'fully_qualified_strict_types' => true,
            'function_to_constant' => true,
            'function_typehint_space' => true,
            'heredoc_to_nowdoc' => true,
            'implode_call' => true,
            'include' => true,
            'list_syntax' => ['syntax' => 'short'],
            'logical_operators' => true,
            'lowercase_cast' => true,
            'lowercase_static_reference' => true,
            'magic_constant_casing' => true,
            'magic_method_casing' => true,
            'modernize_types_casting' => true,
            'multiline_comment_opening_closing' => true,
            'multiline_whitespace_before_semicolons' => true,
            'native_constant_invocation' => true,
            'native_function_casing' => true,
            'native_function_invocation' => ['include' => ['@compiler_optimized']],
            'new_with_braces' => true,
            'no_alias_functions' => true,
            'no_binary_string' => true,
            'no_blank_lines_after_class_opening' => true,
            'no_blank_lines_after_phpdoc' => true,
            'no_empty_comment' => true,
            'no_empty_phpdoc' => true,
            'no_empty_statement' => true,
            'no_extra_blank_lines' => true,
            'no_homoglyph_names' => true,
            'no_leading_import_slash' => true,
            'no_leading_namespace_whitespace' => true,
            'no_mixed_echo_print' => true,
            'no_multiline_whitespace_around_double_arrow' => true,
            'no_php4_constructor' => true,
            'no_short_bool_cast' => true,
            'no_singleline_whitespace_before_semicolons' => true,
            'no_spaces_around_offset' => true,
            'no_trailing_comma_in_list_call' => true,
            'no_trailing_comma_in_singleline_array' => true,
            'no_unneeded_control_parentheses' => true,
            'no_unneeded_curly_braces' => true,
            'no_unneeded_final_method' => true,
            'no_unreachable_default_argument_value' => true,
            'no_unused_imports' => true,
            'no_useless_return' => true,
            'no_whitespace_before_comma_in_array' => true,
            'no_whitespace_in_blank_line' => true,
            'non_printable_character' => true,
            'normalize_index_brace' => true,
            'object_operator_without_whitespace' => true,
            'ordered_class_elements' => ['order' => ['use_trait', 'constant', 'property', 'construct', 'method']],
            'ordered_imports' => true,
            'php_unit_construct' => true,
            'php_unit_dedicate_assert' => ['target' => 'newest'],
            'php_unit_expectation' => true,
            'php_unit_method_casing' => true,
            'php_unit_mock' => true,
            'php_unit_namespaced' => true,
            'php_unit_no_expectation_annotation' => true,
            'php_unit_set_up_tear_down_visibility' => true,
            'php_unit_strict' => true,
            'php_unit_test_annotation' => true,
            'php_unit_test_case_static_method_calls' => ['call_type' => 'this'],
            'phpdoc_add_missing_param_annotation' => true,
            'phpdoc_align' => ['align' => 'left'],
            'phpdoc_annotation_without_dot' => true,
            'phpdoc_indent' => true,
            'phpdoc_inline_tag' => true,
            'phpdoc_no_access' => true,
            'phpdoc_no_alias_tag' => true,
            'phpdoc_no_package' => true,
            'phpdoc_no_useless_inheritdoc' => true,
            'phpdoc_return_self_reference' => true,
            'phpdoc_scalar' => true,
            'phpdoc_single_line_var_spacing' => true,
            'phpdoc_summary' => true,
            'phpdoc_to_comment' => true,
            'phpdoc_trim' => true,
            'phpdoc_trim_consecutive_blank_line_separation' => true,
            'phpdoc_types' => true,
            'phpdoc_var_without_name' => true,
            'pow_to_exponentiation' => true,
            'psr4' => true,
            'return_type_declaration' => true,
            'self_accessor' => true,
            'semicolon_after_instruction' => true,
            'set_type_to_cast' => true,
            'short_scalar_cast' => true,
            'simplified_null_return' => true,
            'single_blank_line_before_namespace' => true,
            'single_line_comment_style' => true,
            'single_quote' => true,
            'space_after_semicolon' => true,
            'standardize_increment' => true,
            'standardize_not_equals' => true,
            'strict_comparison' => true,
            'strict_param' => true,
            'string_line_ending' => true,
            'ternary_operator_spaces' => true,
            'ternary_to_null_coalescing' => true,
            'trailing_comma_in_multiline_array' => true,
            'trim_array_spaces' => true,
            'whitespace_after_comma_in_array' => true,
        ];
    }
}
