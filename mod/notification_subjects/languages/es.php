<?php

$spanish = array(
    'notification_subjects' => "Notificaciones avanzadas",
    'notification_subjects:action' => "Settings",
    'notification_subjects:default:subject' => "Default Subject",
    'notification_subjects:event:create' => "(creado)",
    'notification_subjects:event:delete' => "(borrado)",
    'notification_subjects:event:update' => "(actualizado)",
    'notification_subjects:group' => "%s",
    'notification_subjects:option:allow' => "Usar asunto descriptivo",
    'notification_subjects:option:default' => "Usar asunto por defecto",
    'notification_subjects:option:deny' => "Desactivar notificaciones",
    'notification_subjects:subtype' => "Subtipo",
    'notification_subjects:untitled' => "Sin título",
	
	'notification_subjects:custom:template' => "Plantilla personalizada",
	'notification_subjects:language_string' => "Plantilla de Cadenas (strings) de idioma",
	'ns:template_default' => '{{name}} {{action}} {{subtype}} {{group}}: {{title}}',
    
    // subtypes
    'notification_subjects:subtype:album' => "Album de imágenes",
    'notification_subjects:subtype:blog' => "Post",
    'notification_subjects:subtype:bookmarks' => "Marcador",
    'notification_subjects:subtype:event_calendar' => "Evento",
    'notification_subjects:subtype:file' => "Archivo",
    'notification_subjects:subtype:folder' => "Carpeta",
    'notification_subjects:subtype:groupforumtopic' => "Discusión",
    'notification_subjects:subtype:image' => "Imagen",
    'notification_subjects:subtype:messages' => "Mensage",
    'notification_subjects:subtype:page' => "Página",
    'notification_subjects:subtype:page_top' => "Página",
    'notification_subjects:subtype:poll' => "Votación",
    'notification_subjects:subtype:thewire' => "Telegrama",
	
	'notification_subjects:disclaimer' => 'Fíjese que no todos los elementos listados aquí pueden enviar notificaciones',
    
	'notification_subjects:settings:help' => "Instrucciones:
<br><br>
Para configurar los elementos del asunto hay 2 métodos.<br>
1. Crear una cadena de idioma personalizada. Esta método es ideal, ya que puede ser diferente para cada idioma.
<br>Introduzca la plantilla en la entrada de texto de la plantilla personalizada. Esto es fácil, pero será el mismo para todos los idiomas.
<br><br>
Plantilla:
<br><br>
La plantilla por defecto es '{{name}} {{action}} {{subtype}} {{group}}: {{title}}'
<br>
Las etiquetas anteriores encerradas entre llaves serán reemplazadas con el contenido apropiado. <br>

{{name}} - El nombre del usuario que realiza la acción<br>
{{action}} - La acción que se ha realizado (creado/actualizado/etc)<br>
{{subtype}} - El tipo de contenido que se ha creado/actualizado/etc<br>
{{group}} - \"En el grupo 'group name' \" - Esto es lo que se usa si se ha creado/actualizado contenido en un grupo<br>
{{title}} - El título o el nombre del contenido, por ejemplo: el título de una entrada de blog
<br><br>
Custom actions can be translated using language strings in the format of 'notification_subjects:event:{{event}}' - where {{event}} = 'create', 'update', 'delete'<br>
Subtypes can be translated with language strings in the format of 'notification_subjects:subject:{{subject}}' - where {{subject}} = 'blog', 'bookmark', 'page', etc.<br>
Group names will be passed into the language string 'notification_subjects:group'",
);
					
add_translation("es",$spanish);
