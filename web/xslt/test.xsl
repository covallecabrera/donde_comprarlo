<!--<xsl:stylesheet version="1.0" 
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

<xsl:template match="x:a[@id='queso']">
    <xsl:copy>
        <xsl:attribute name="class">
            <xsl:text>nuevoAtributoClase</xsl:text>
        </xsl:attribute>
        <xsl:apply-templates select="node()|@*"/>
    </xsl:copy>
</xsl:template>

<xsl:template match="x:a[@class='vida']">
    <xsl:copy>
        <xsl:attribute name="id">
            <xsl:text>nuevoAtributoId</xsl:text>
        </xsl:attribute>
        <xsl:apply-templates select="node()|@*"/>
    </xsl:copy>
</xsl:template>
 

</xsl:stylesheet> -->

<xsl:stylesheet version="1.0"
 xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
 xmlns:xhtml="http://www.w3.org/1999/xhtml"
 xmlns="http://www.w3.org/1999/xhtml"
 exclude-result-prefixes="xhtml">
    <xsl:template match="/">
        <html lang="es">
            <head></head>
            <body>
              <a id="nombre"> Nombre:

                  <xsl:value-of select="//xhtml:span[@itemprop='name']"/>
                  
              </a><br></br>

              <a id="precio"> Precio:
                <xsl:value-of select="//xhtml:p[@class='ofomp']"/>
              </a><br></br>
              <a id="descripcion"> Descripción:
                
                <xsl:variable name="asd" select="//xhtml:span[@itemprop='description']" />
                <xsl:variable name="asd2" select="//xhtml:div[@id='Description']" />

                <xsl:for-each select="$asd">

                  <!-- <xsl:if test= "contains($asd,'Rafa3')"> -->

                    <xsl:value-of select="." /><br></br>

                  <!-- </xsl:if> -->

                </xsl:for-each>
              </a>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>

<!-- <xsl:stylesheet version="1.0"
 xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
 xmlns:x="http://www.w3.org/1999/xhtml"
 exclude-result-prefixes="xmlns">
 <xsl:output indent="yes" encoding="iso-8859-1"/>


 <xsl:template match="/">
  <html xmlns="http://www.w3.org/1999/xhtml" lang="en">
   <head/>
   <body>
   
    <xsl:apply-templates />
    
   </body>
  </html>
 </xsl:template>

 <xsl:template match="x:span[@itemprop='name']">
  <a id="nombre">
  <xsl:value-of select="."/>
  </a>
 </xsl:template>
 <xsl:template match="text()"/>

 <xsl:template match="x:span[@itemprop='description2']">
  <br></br>
  <a id="descripcion">
  <xsl:value-of select="."/>
</a>
 </xsl:template>
 <xsl:template match="text()"/>


</xsl:stylesheet> -->