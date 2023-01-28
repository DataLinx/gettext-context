<?php

if (! function_exists('pgettext')) {
    /**
     * Lookup a message in the current domain for the specified context.
     *
     * @param string $context Context of the message
     * @param string $message The message being translated
     * @return string Translated string if one is found in the translation table, or the submitted message if not found
     */
    function pgettext(string $context, string $message): string
    {
        $context_message = "$context\004$message";

        $translation = gettext($context_message);

        // If the translation was not found...
        if ($translation === $context_message) {
            // Return original message
            return $message;
        }

        return $translation;
    }
}

if (! function_exists('npgettext')) {
    /**
     * The plural version of pgettext(). Some languages have more than one form for plural messages dependent on the count.
     *
     * @param string $context Context of the message
     * @param string $singular The singular message ID
     * @param string $plural The plural message ID
     * @param int $number The number (e.g. item count) to determine the translation for the respective grammatical number
     * @return string Correct plural form of message identified by $singular and $plural for $number
     */
    function npgettext(string $context, string $singular, string $plural, int $number): string
    {
        $context_singular = "$context\004$singular";
        $context_plural = "$context\004$plural";

        $translation = ngettext($context_singular, $context_plural, $number);

        // If the translation was not found...
        if ($translation === $context_singular || $translation === $context_plural) {
            // Use native function to return the appropriate string
            return ngettext($singular, $plural, $number);
        }

        return $translation;
    }
}

if (! function_exists('dpgettext')) {
    /**
     * The dpgettext() function allows you to override the current domain for a single message lookup for the specified context.
     *
     * @param string $domain The domain
     * @param string $context Context of the message
     * @param string $message The message being translated
     * @return string Translated string if one is found in the translation table, or the submitted message if not found
     */
    function dpgettext(string $domain, string $context, string $message): string
    {
        $context_message = "$context\004$message";

        $translation = dgettext($domain, $context_message);

        // If the translation was not found...
        if ($translation === $context_message) {
            // Return original message
            return $message;
        }

        return $translation;
    }
}

if (! function_exists('dnpgettext')) {
    /**
     * The dnpgettext() function allows you to override the current domain for a single plural message lookup for the specified context.
     *
     * @param string $domain The domain
     * @param string $context Context of the message
     * @param string $singular The singular message ID
     * @param string $plural The plural message ID
     * @param int $number The number (e.g. item count) to determine the translation for the respective grammatical number
     * @return string Translated string if one is found in the translation table, or the submitted message if not found
     */
    function dnpgettext(string $domain, string $context, string $singular, string $plural, int $number): string
    {
        $context_singular = "$context\004$singular";
        $context_plural = "$context\004$plural";

        $translation = dngettext($domain, $context_singular, $context_plural, $number);

        // If the translation was not found...
        if ($translation === $context_singular || $translation === $context_plural) {
            // Use native function to return the appropriate string
            return dngettext($domain, $singular, $plural, $number);
        }

        return $translation;
    }
}
