<xsl:stylesheet version="1.0" 
xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
xmlns="http://www.w3.org/1999/xhtml"
xmlns:x="http://www.w3.org/1999/xhtml"
exclude-result-prefixes="x">

<xsl:output method="xml" indent="yes"/>

<xsl:strip-space elements="*"/>

<xsl:template match="node()|@*">
    <xsl:copy>
        <xsl:apply-templates select="node()|@*" />
    </xsl:copy>
</xsl:template>

<xsl:template match="x:div[@id='mbContent']">
    <xsl:copy>
        <xsl:attribute name="class">
            <xsl:text>someNewStyle</xsl:text>
        </xsl:attribute>
        <xsl:apply-templates select="node()|@*"/>
    </xsl:copy>
</xsl:template>
</xsl:stylesheet>